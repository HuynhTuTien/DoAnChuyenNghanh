<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('khadyo@gmail.com')
                    ->subject('Chi tiết đơn hàng của bạn')
                    ->view('emails.payment_success')
                    ->with([
                        'order' => $this->order,
                        'user' => $this->order->user,
                    ]);
    }
}
