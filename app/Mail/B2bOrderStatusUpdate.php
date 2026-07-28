<?php

namespace App\Mail;

use App\Models\B2bPartner;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class B2bOrderStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public B2bPartner $partner;
    public string $newStatus;

    public function __construct(Order $order, B2bPartner $partner, string $newStatus)
    {
        $this->order     = $order;
        $this->partner   = $partner;
        $this->newStatus = $newStatus;
    }

    public function build(): self
    {
        $orderId = $this->order->orderno ?? ('#' . $this->order->id);

        return $this
            ->subject("Order Update — {$orderId} — {$this->newStatus}")
            ->view('emails.b2b.order-status-update');
    }
}
