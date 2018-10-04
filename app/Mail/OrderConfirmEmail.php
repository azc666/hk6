<?php

namespace App\Mail;

use App\Http\Controllers\CartOrderController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class OrderConfirmEmail extends Mailable
{
    
    use Queueable, SerializesModels;
    
    public $cartOrder;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cartOrder)
    {
        //
        $this->cartOrder = $cartOrder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // if (Auth::user()->username == 'HK34' || Auth::user()->username == 'HK35' || Auth::user()->username == 'HK46' ) {
        //     return $this->view('emails.orderConfirm')
        //     ->subject('HK Order Portal Email Confirmation')
        //     ->from('support@g-d.com')
        //     ->bcc('sheri.testa@hklaw.com')
        //     ->bcc('output@g-d.com')
        //     ->bcc('tmann999@gmail.com')
        //     ;
        // } else {
            return $this->view('emails.orderConfirm')
            ->subject('HK Order Portal Email Confirmation')
            ->from('support@g-d.com')
            // ->bcc('sheri.testa@hklaw.com')
           ->bcc('output@g-d.com')
            // ->bcc('tmann999@gmail.com')
            ;
        }

        
    }

