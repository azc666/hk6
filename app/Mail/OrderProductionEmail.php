<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProductionEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $cartOrderProduction;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cartOrderProduction)
    {
        //
        $this->cartOrderProduction = $cartOrderProduction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderProduction')
            ->subject('HK Order Portal Production Email')
            ->from('support@g-d.com');
    }
}
