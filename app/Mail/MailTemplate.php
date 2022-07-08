<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTemplate extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $topic;
    public $recipient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $message, string $topic, string $recipient)
    {
        $message = str_replace("\n", "", $message);
        $this->message = $message;
        $this->topic = $topic;
        $this->recipient = $recipient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->topic)
            ->to($this->recipient)
            ->markdown('vendor.mail.html.message', ['slot' => $this->message]);

    }
}
