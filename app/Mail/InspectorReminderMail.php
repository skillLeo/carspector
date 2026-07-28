<?php

namespace App\Mail;

use App\Models\Inspector;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InspectorReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Inspector $inspector;
    public Order $order;
    public ?string $acceptUrl;
    public ?string $declineUrl;

    public function __construct(Inspector $inspector, Order $order, ?string $responseToken = null)
    {
        $this->inspector  = $inspector;
        $this->order      = $order;
        $this->acceptUrl  = $responseToken ? route('inspector.respond.accept', $responseToken) : null;
        $this->declineUrl = $responseToken ? route('inspector.respond.decline', $responseToken) : null;
    }

    public function build(): self
    {
        return $this
            ->subject('Erinnerung: Anfrage | Auftrag ' . ($this->order->orderno ?? ('#' . $this->order->id)))
            ->view('emails.inspector.reminder');
    }
}
