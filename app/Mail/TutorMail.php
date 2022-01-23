<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TutorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tutorDetails;
    public $tutorLink;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tutorDetails, $tutorLink)
    {
       $this->tutorDetails = $tutorDetails;
       $this->tutorLink = $tutorLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset Password Link')->view('tutorForgetMail');
    }
}
