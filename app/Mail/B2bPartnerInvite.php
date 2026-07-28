<?php

namespace App\Mail;

use App\Models\B2bPartner;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class B2bPartnerInvite extends Mailable
{
    use Queueable, SerializesModels;

    public B2bPartner $partner;
    public string $registerUrl;
    public int $expiryHours;

    public function __construct(B2bPartner $partner)
    {
        $this->partner = $partner;
        $this->registerUrl = route('b2b.register', $partner->registration_token);
        $this->expiryHours = (int) env('B2B_INVITE_TOKEN_HOURS', 48);
    }

    public function build(): self
    {
        return $this
            ->subject('You have been invited to Carspector Partner Portal')
            ->view('emails.b2b.partner-invite');
    }
}
