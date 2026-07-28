<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InspectionTeam2Mail extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build(): self
    {
        $orderId = $this->order->orderno ?? ('#' . $this->order->id);

        $to = $this->order->soh_check
            ? env('INSPECTION_PARTNER_SOH_EMAIL', env('INSPECTION_PARTNER_EMAIL', 'partner@carspector.de'))
            : env('INSPECTION_PARTNER_EMAIL', 'partner@carspector.de');

        $mail = $this
            ->to($to)
            ->subject("CarCheck | {$orderId}")
            ->view('emails.inspection-team2.order-assigned');

        if ($this->order->soh_check) {
            $mail->cc('info@carspector.de');
        }

        return $mail;
    }
}
