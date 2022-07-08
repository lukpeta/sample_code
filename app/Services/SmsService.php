<?php

namespace App\Services;

use SerwerSMS\SerwerSMS;

class SmsService
{

    /**
     * @param string $txt
     * @param int $phoneNumber
     * @return void
     * @throws SerwerSMS\Exception
     */
    public function send(string $txt, int $phoneNumber): void
    {
        $serwerSms = new \SerwerSMS\SerwerSMS(env('SERWERSMS_LOGIN'), env('SERWERSMS_PASS'));

        $result = $serwerSms->messages->sendSms(
            array($phoneNumber),
            $txt,
            'odsylamy.pl',
            array()
        );
    }
}
