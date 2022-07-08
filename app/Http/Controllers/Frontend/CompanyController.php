<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CompanyContactRequest;
use App\Http\Requests\Web\CompanyOrderPackageRequest;
use App\Http\Resources\CalculatePricePackageResource;
use App\Repositories\Eloquent\Interfaces\UserCompanySettingRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\UserRepositoryInterface;
use App\Services\ContactFormMailService;
use App\Services\InpostService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{

    public function __construct(UserCompanySettingRepositoryInterface $companySettingRepository,
                                UserRepositoryInterface               $userRepository,
                                ContactFormMailService                $mailService,
                                InpostService                         $inpostService
    )
    {
        $this->companySettingRepository = $companySettingRepository;
        $this->userRepository = $userRepository;
        $this->mailService = $mailService;
        $this->inpostService = $inpostService;
    }

    public function index(string $slug, Request $request): View
    {
        $company = $this->userRepository->findCompany($slug);
        if (!isset($company)) return redirect()->route('home', 301);

        return view('frontend.company', [
            'keywords' => $company->company_name,
            'descriptions' => $company->company_name,
            'title' => $company->company_name,
            'company' => $company,
        ]);
    }

    public function orderPackage(string $slug, CompanyOrderPackageRequest $request)
    {
        return $this->inpostService->orderPayPackage($request, $this->userRepository->findCompany($slug));
    }

    public function contactWithCompany(string $slug, CompanyContactRequest $request)
    {
        $company = $this->userRepository->findCompany($slug);
        $this->mailService->send($company->email, "Masz wiadomość ze strony odsylamy.pl", $request);

        return redirect(route('company', ['slug' => $slug]), 301)->with('success', 'Wiadomość została wysłana poprawnie!');
    }

    public function calculatePrice(Request $request)
    {
        return new CalculatePricePackageResource($this->userRepository->findCompany($request->slug));
    }
}
