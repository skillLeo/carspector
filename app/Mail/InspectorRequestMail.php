<?php

namespace App\Mail;

use App\Models\Inspector;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InspectorRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public ?Inspector $inspector;
    public Order $order;
    public string $emailBody;
    public string $portalUrl;
    public ?string $acceptUrl;
    public ?string $declineUrl;

    public function __construct(?Inspector $inspector, Order $order, string $emailBody, ?string $responseToken = null)
    {
        $this->inspector  = $inspector;
        $this->order      = $order;
        $this->emailBody  = $emailBody;
        $this->portalUrl  = route('inspector.requests');
        $this->acceptUrl  = $responseToken ? route('inspector.respond.accept', $responseToken) : null;
        $this->declineUrl = $responseToken ? route('inspector.respond.decline', $responseToken) : null;
    }

    public function build(): self
    {
        return $this
            ->subject('Auftrag für CarCheck – Interesse an Zusammenarbeit? | ' . ($this->order->orderno ?? ('#' . $this->order->id)))
            ->cc('partner@carspector.de')
            ->view('emails.inspector.request');
    }
}
