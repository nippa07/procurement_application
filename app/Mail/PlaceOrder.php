<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlaceOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $response['order'] = $this->data;
        $response['sum'] = 0;
        foreach ($response['order']->order_items as $order_item) {
            $response['sum'] += $order_item->quantity * $order_item->item->unit_price;
        }
        return $this->view('mails.purchase_order')
            ->subject('New purchase order')
            ->with($response);
    }
}
