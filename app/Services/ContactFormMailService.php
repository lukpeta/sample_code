<?php

namespace App\Services;

use App\Mail\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormMailService
{

    /**
     * @param string $recipient
     * @param string $topic
     * @param Request $request
     * @return void
     */
    public function send(string $recipient, string $topic, Request $request): void
    {
        try {
            $message = "
        <b>Dane wiadomości:</b> " . now()->toDateString() . " [IP: " . $request->getClientIp() . "]<br/>
        <b>Imię i nazwisko:</b> " . $request->input('name') . "<br/>
        <b>Adres email:</b> " . $request->input('email') . "<br/>
        <b>Numer telefonu:</b> " . $request->input('phone') . "<br/>
        <b>Temat wiadomości:</b> " . $request->input('theme') . "<br/>
        <b>Wiadomość:</b> " . nl2br($request->input('message')) . "<br/>";
            Mail::to($recipient)->send(new MailTemplate($message, $topic, $recipient));
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
}
