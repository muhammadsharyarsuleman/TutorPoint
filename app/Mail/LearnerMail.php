<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LearnerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $link)
    {
       $this->details = $details;
       $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset Password Link')->view('learnerForgetMail');
    }
}
