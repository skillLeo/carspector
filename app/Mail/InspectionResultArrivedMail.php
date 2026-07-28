<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InspectionResultArrivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public array $savedFiles;

    public function __construct(Order $order, array $savedFiles)
    {
        $this->order      = $order;
        $this->savedFiles = $savedFiles;
    }

    public function build(): self
    {
        $orderId = $this->order->orderno ?? ('#' . $this->order->id);
        return $this
            ->subject("Prüfungsergebnis eingegangen | {$orderId}")
            ->view('emails.inspection-result-arrived');
    }
}
