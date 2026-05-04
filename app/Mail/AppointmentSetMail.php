<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentSetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    protected string $viewName;

    public function __construct($order)
    {
        $this->order = $order;
        $isEnglish = (bool) ($order->document_in_english ?? false);
        if ($isEnglish) {
            $this->subject = 'Your Carspector appointment has been scheduled';
            $this->viewName = 'mail.appointment-set-en';
        } else {
            $this->subject = 'Ihr Carspector Termin wurde gesetzt';
            $this->viewName = 'mail.appointment-set';
        }
    }

    public function build()
    {
        return $this->view($this->viewName, [
            'order' => $this->order,
        ]);
    }
}
