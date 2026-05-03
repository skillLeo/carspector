<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentSetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
        $this->subject = 'Ihr Carspector Termin wurde gesetzt';
    }

    public function build()
    {
        return $this->markdown('mail.appointment-set', [
            'order' => $this->order,
        ]);
    }
}
