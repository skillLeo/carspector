<?php

namespace App\Mail;

use App\Models\B2bPartner;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class B2bOrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public B2bPartner $partner;

    public function __construct(Order $order, B2bPartner $partner)
    {
        $this->order   = $order;
        $this->partner = $partner;
    }

    public function build(): self
    {
        $orderId = $this->order->orderno ?? ('#' . $this->order->id);

        return $this
            ->to(env('INSPECTION_PARTNER_EMAIL', 'partner@carspector.de'))
            // ->cc('info@carspector.de')
            ->subject("CarCheck | {$orderId}")
            ->view('emails.b2b.order-placed');
    }
}
