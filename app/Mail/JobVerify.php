<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobVerify extends Mailable
{
    use Queueable, SerializesModels;
    protected $ownToken;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->ownToken = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->ownToken;
        return $this->from('admin@jobportal.com')
            ->subject('Job Verification')
            ->view('mail.job-verification',compact('token'));
    }
}
