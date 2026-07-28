<?php

namespace App\Mail;

use App\Models\Inspector;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InspectorExamStartMail extends Mailable
{
    use Queueable, SerializesModels;

    public Inspector $inspector;
    public Order $order;
    public string $examStartUrl;

    public function __construct(Inspector $inspector, Order $order, string $examStartUrl = '')
    {
        $this->inspector    = $inspector;
        $this->order        = $order;
        $this->examStartUrl = $examStartUrl;
    }

    public function build(): self
    {
        return $this->subject('Zugangsdaten | Auftrag ' . ($this->order->orderno ?? ('#' . $this->order->id)) . ' | ' . ($this->order->vehicle_make_model ?? ''))
        ->cc('partner@carspector.de')
        ->view('emails.inspector.exam-start');
    }
}
