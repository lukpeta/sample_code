<?php

namespace App\Repositories\Eloquent\Interfaces;

use App\Repositories\Eloquent\Interfaces\BaseRepositoryInterface;

interface PaymentRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * @param int $sessionId
     * @param string $amount
     * @param string $currency
     * @return mixed
     */
    public function getPaymentToVerification(int $sessionId, string $amount, string $currency): mixed;

}
