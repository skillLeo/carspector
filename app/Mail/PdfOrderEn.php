<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PdfOrderEn extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $examination;
    public $user;
    public $hideUpsell = false;

    public function __construct($order, $examination, $user, $hideUpsell = false)
    {
        $this->user = $user;
        $this->order = $order;
        $this->examination = $examination;
        $this->hideUpsell = (bool) $hideUpsell;
        $this->subject = 'Your inspection result is ready | ' . ($this->order->vehicle_make_model ?? '');
    }

    public function build()
    {
        return $this->markdown('mail.pdf-mail-en', [
            'user' => $this->user,
            'booking' => $this->order,
            'examination' => $this->examination,
            'hideUpsell' => $this->hideUpsell,
        ]);
    }
}
