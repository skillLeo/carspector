<?php

namespace App\Mail;

use App\Models\Inspector;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InspectorInviteMail extends Mailable
{
    use Queueable, SerializesModels;

    public Inspector $inspector;
    public string $registerUrl;
    public int $expiryHours;

    public function __construct(Inspector $inspector)
    {
        $this->inspector   = $inspector;
        $this->registerUrl = route('inspector.register', $inspector->invitation_token);
        $this->expiryHours = 72;
    }

    public function build(): self
    {
        return $this
            ->subject('Einladung zum neuen Carspector Portal')
            ->view('emails.inspector.invite');
    }
}
