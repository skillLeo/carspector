<?php

namespace App\Mail;

use App\Models\Inspector;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InspectorAssignmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public Inspector $inspector;
    public Order $order;
    public string $directLink;
    public string $examStartUrl;
    public string $appointmentUrl;

    public function __construct(Inspector $inspector, Order $order, string $directLink, string $examStartUrl = '', string $appointmentUrl = '')
    {
        $this->inspector    = $inspector;
        $this->order        = $order;
        $this->directLink   = $directLink;
        $this->examStartUrl = $examStartUrl ?: $directLink;
        $this->appointmentUrl = $appointmentUrl ?: \Illuminate\Support\Facades\URL::signedRoute(
            'appointment.confirm.show', ['order' => $order->id], now()->addDays(7)
        );
    }

    public function build(): self
    {
        return $this->subject('Re: Auftragsbestätigung | Auftrag ' . ($this->order->orderno ?? ('#' . $this->order->id)) . ' | ' . ($this->order->vehicle_make_model ?? ''))
        ->cc('partner@carspector.de')
        ->view('emails.inspector.assignment');
    }
}
