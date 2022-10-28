<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Verify extends Mailable
{
    use Queueable, SerializesModels;

    public $verification;

    public function __construct($verification)
    {
        $this->verification = $verification;
    }

    public function build()
    {
        // return $this
        //     ->subject('Thank you for subscribing to our newsletter')
        //     ->markdown('mailer.verification');

        $verification = $this->verification;

        $this->from($verification['email'], 'BNHS')->subject('Enrollment Verification')->markdown('mailer.verification');
    }
}
