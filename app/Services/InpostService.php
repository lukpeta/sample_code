<?php

namespace App\Services;


use App\Models\User;
use App\Repositories\Eloquent\Interfaces\PaymentRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ShippedParcelRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\SmsService;
use App\Services\InpostMailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Imper86\PhpInpostApi\Enum\ServiceType;
use Imper86\PhpInpostApi\InpostApi;


class InpostService
{
    public function __construct(SmsService                       $smsService,
                                InpostMailService                $mailService,
                                ShippedParcelRepositoryInterface $shippedParcelRepository,
                                PaymentRepositoryInterface       $paymentRepository,
                                UserRepositoryInterface          $userRepository
    )
    {
        $this->smsService = $smsService;
        $this->mailService = $mailService;
        $this->shippedParcelRepository = $shippedParcelRepository;
        $this->paymentRepository = $paymentRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $parcelNumber
     * @return Collection
     */
    public function getTracking(string $parcelNumber): Collection
    {
        $statuses = $this->getStatuses();

        try {
            $url = 'https://api-shipx-pl.easypack24.net/v1/tracking/' . $parcelNumber;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $result = collect(json_decode($result));

            if (empty($result['tracking_details'])) {
                return collect([
                    'message' => 'Nie znaleziono informacji o śledzeniu przesyłki: ' . $parcelNumber,
                    'error' => 1
                ]);
            }

            $trackingDetails = Collection::empty();

            foreach ($result['tracking_details'] as $status) {
                $status = [
                    'status' => $this->getStatusName($status->status, $statuses),
                    'origin_status' => $status->origin_status,
                    'datetime' => \Carbon\Carbon::parse($status->datetime)->toDateTimeString(),
                    'agency' => $status->agency,
                    'error' => 0
                ];
                $trackingDetails->push(($status));
            }

            $parcelStatus = collect([
                'main_status' => $this->getStatusName($result['status'], $statuses),
                'tracking_details' => $trackingDetails
            ]);
            return $parcelStatus;
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * @param string $name
     * @param Collection $statuses
     * @return \stdClass
     */
    private function getStatusName(string $name, Collection $statuses): \stdClass
    {
        $status = collect($statuses)->where('name', $name);
        return ($status->first());
    }

    /**
     * @return Collection
     */
    private function getStatuses(): Collection
    {
        try {
            $url = 'https://api-shipx-pl.easypack24.net/v1/statuses';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $result = collect(json_decode($result));
            return collect($result['items']);
        } catch (Exception $e) {
            return $e;
        }
    }


    /**
     * @param Request $request
     * @param User $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function orderPayPackage(Request $request, User $company)
    {
        $paymentStatus = $company->id . '-' . $random = Str::random(220);
        $data['is_return'] = 0;
        $data['inpost_is_non_standard'] = 0;
        $data['ip'] = $request->ip();
        $data['company_id'] = $company->id;
        $data['user_id'] = Auth::user()->id ?? 1;

        $data['payment_shipment'] = 1;
        $data['payment_status'] = 1;
        $data['payment_token'] = $paymentStatus;

        $data['receiver_city'] = $company->city;
        $data['receiver_post_code'] = $company->postal_code;
        $data['receiver_country_code'] = 'PL';
        $data['receiver_street'] = $company->street;
        $data['receiver_building_number'] = $company->building_number;
        $data['receiver_phone'] = $company->phone;
        $data['receiver_email'] = $company->email;
        $data['receiver_first_name'] = $company->name ?? '';
        $data['receiver_last_name'] = $company->surname ?? '';
        $data['receiver_company_name'] = $company->companyDetails->settings['company_name'] ?? '';
        $data['receiver_address'] = '';

        $data['sender_city'] = $request->order_city;
        $data['sender_post_code'] = $request->order_post_code;
        $data['sender_country_code'] = 'PL';
        $data['sender_street'] = $request->order_address;
        $data['sender_building_number'] = $request->building_number;
        $data['sender_phone'] = $request->order_phone;
        $data['sender_email'] = $request->order_email;
        $data['sender_first_name'] = $request->order_name;
        $data['sender_last_name'] = $request->order_surname;
        $data['sender_address'] = '';

        $data['shipping_method'] = $request->shipping_method;
        $data['package_type'] = $request->package_type;
        $data['package_size'] = $request->package_size;
        $data['shipping_company'] = $request->shipping_company;

        $data['order_description'] = $request->order_decsription;
        $data['order_sending_parcel'] = $request->order_sending_parcel;
        $data['order_recipient_parcel'] = $request->order_recipient_parcel;

        $data['inpost_shipment_id'] = 0;
        $data['inpost_tracking_number'] = '';

        $data['inpost_parcel_height'] = 0;
        $data['inpost_parcel_length'] = 0;
        $data['inpost_parcel_width'] = 0;


        $data['inpost_label_file_name'] = '';
        $data['return_customer'] = false;
        $parcel = $this->shippedParcelRepository->create($data);

        return $this->registrationPaymentForParcel($request, $paymentStatus, $parcel->id, $company);
    }

    /**
     * @param Request $request
     * @param string $paymentStatus
     * @param int $parcelId
     * @param User $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     * @throws \Devpark\Transfers24\Exceptions\RequestException
     * @throws \Devpark\Transfers24\Exceptions\RequestExecutionException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function registrationPaymentForParcel(Request $request, string $paymentStatus, int $parcelId, User $company)
    {
        $price = 0;
        if ($request->package_size == 1) {
            $price = $company->companyDetails->settings['package_price_1'];
        }
        if ($request->package_size == 2) {
            $price = $company->companyDetails->settings['package_price_2'];
        }
        if ($request->package_size == 3) {
            $price = $company->companyDetails->settings['package_price_3'];
        }

        $registration_request = app()->make(\Devpark\Transfers24\Requests\Transfers24::class);
        $registration_request->setUrlReturn(route('transfer-callback-package'));
        $registration_request->setUrlStatus(route('transfer-status-package'));

        $lastid = $this->paymentRepository->getMaxId() + 1;
        $register_payment = $registration_request
            ->setEmail($request->order_email)
            ->setDescription('Płatność za przesyłkę w serwisie odsylamy.pl: ' . $lastid)
            ->setClientName($request->order_name . ' ' . $request->order_surname)
            ->setAmount($price)
            ->setCountry('POLAND')
            ->setLanguage('pl')
            ->init();

        if ($register_payment->isSuccess()) {
            $post = $register_payment->getRequestParameters();
            $data['user_id'] = Auth::user()->id ?? 1;
            $data['ip'] = $request->getClientIp();
            $data['sessionId'] = $post['sessionId'];
            $data['amount'] = $post['amount'];
            $data['currency'] = $post['currency'];
            $data['description'] = $post['description'];
            $data['email'] = $post['email'];
            $data['client'] = $post['client'];
            $data['sign'] = $post['sign'];
            $data['operation_status'] = 'begin';
            $data['price_list_id'] = 0;
            $data['price_list_option'] = 0;
            $data['is_return_package'] = 0;
            $data['payment_parcel'] = $parcelId;

            return redirect($registration_request->execute($register_payment->getToken(), false), 301);
        }
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \SerwerSMS\SerwerSMS\Exception
     */
    public function makePayment(Request $request): string
    {
        $payment_verify = app()->make(\Devpark\Transfers24\Requests\Transfers24::class);
        $payment_response = $payment_verify->receive($request);

        if ($payment_response->isSuccess()) {
            $payment = $paymentRepository->getPaymentToVerification($request->sessionId, $request->amount, $request->currency);
            $data['operation_status'] = 'finish';
            $payment->update($data);

            $package = $shippedParcelRepository->findBy('id', $payment->payment_parcel);
            $data['payment_status'] = 2;
            $package->update($data);

            $token = env('INPOST_TOKEN');
            $organizationId = env('INPOST_ORGANIZATION_ID');
            $isSandbox = true;

            $api = new InpostApi($token, $isSandbox);

            $company = $this->userRepository->findBy('id', $package->company_id);

            $phone = str_replace(' ', '', $company->phone);
            $phone = str_replace('+', '', $phone);

            $phoneSender = str_replace(' ', '', $package->sender_phone);
            $phoneSender = str_replace('+', '', $phoneSender);

            if ($package->package_size == 1) {
                $packageSize = 'small';
            } elseif ($package->package_size == 2) {
                $packageSize = 'medium';
            } else {
                $packageSize = 'large';
            }

            $response = $api->organizations()->shipments()->post($organizationId, [
                'receiver' => [
                    'company_name' => $company->company_name ?? '',
                    'first_name' => $company->name ?? '',
                    'last_name' => $company->surname ?? '',
                    'email' => $company->email,
                    'phone' => $phone,
                ],
                'sender' => [
                    'first_name' => $package->sender_first_name ?? '',
                    'last_name' => $package->sender_last_name ?? '',
                    'email' => $package->sender_email,
                    'phone' => $phoneSender,
                ],
                'parcels' => [
                    [
                        'template' => $packageSize,
                        'is_return' => 0
                    ],
                ],
                'custom_attributes' => [
                    //  'sending_method' => 'dispatch_order',
                    'dropoff_point' => $package->order_sending_parcel,
                    'target_point' => $package->order_recipient_parcel,
                ],
                'service' => ServiceType::INPOST_LOCKER_STANDARD,
            ]);

            $shipmentData = json_decode($response->getBody()->__toString(), true);

            if (isset($shipmentData['error'])) {
                Log::error('Payment error: ');
                Log::error($shipmentData['error']);
                die();
            } else {

                $fileName = null;
                while ($shipmentData['status'] !== 'confirmed') {
                    sleep(1);
                    $response = $api->shipments()->get($shipmentData['id']);
                    $shipmentData = json_decode($response->getBody()->__toString(), true);
                }
                $labelResponse = $api->shipments()->label()->get($shipmentData['id'], [
                    'format' => 'Pdf',
                    'type' => 'A6',
                ]);

                if ($shipmentData['status'] == 'confirmed') {
                    $fileName = $company->id . '-' . $shipmentData['id'] . '-' . $shipmentData['tracking_number'] . '.pdf';

                    $dimensions = $shipmentData['parcels']['0']['dimensions'];
                    $data['inpost_parcel_height'] = $dimensions['height'];
                    $data['inpost_parcel_length'] = $dimensions['length'];
                    $data['inpost_parcel_width'] = $dimensions['width'];
                    $data['inpost_label_file_name'] = $fileName;
                    $package->update($data);

                    file_put_contents('inpost_label/' . $fileName, $labelResponse->getBody()->__toString());

                    $this->sendEmailWithConfirmPayment($package->sender_email, $fileName);
                    $this->smsService->send('odsylamy.pl: Twoje zlecenie zostalo przyjete.', $package->sender_phone);
                }
            }

            return "OK";
        } else {
            return "ERROR";
        }
    }

    public function sendEmailWithConfirmPayment(string $email, string $fileName): void
    {
        $message = "
            Witaj,<br/>
             Dziękujemy za skorzystanie z naszych usług.
            Kliknij poniższy link aby pobrać etykietkę służącą do nadania przesyłki w paczkomacie Inpost:
            <a href=" . env('APP_URL') . "/inpost_label/" . $fileName . ">" . env('APP_URL') . "/inpost_label/" . $fileName . "</a>
            <br/><br/><br/>
            Pozdrawiamy zespół odsylamy.pl
        ";
        $this->mailService->send($email, "odsylamy.pl - etykieta inpost", $message);
    }

}
