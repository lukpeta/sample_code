<?php

namespace App\Repositories\Eloquent;

use App\Models\Payment;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\PaymentRepositoryInterface;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{

    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $sessionId
     * @param string $amount
     * @param string $currency
     * @return mixed
     */
    public function getPaymentToVerification(int $sessionId, string $amount, string $currency): mixed
    {
        return $this->model->where('sessionId', $sessionId)
            ->where('is_return_package', 0)
            ->where('amount', $amount)
            ->where('currency', $currency)
            ->where('operation_status', 'begin')
            ->firstOrFail();
    }
}
