<?php

namespace App\Mail;

use App\Http\Controllers\UserController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactusEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contactus')
            ->subject('Your Support Email Confirmation')
            ->from('support@g-d.com')
            // ->bcc('support@arhorderportal.com');
            ->bcc('azc666@gmail.com');
    }
}
