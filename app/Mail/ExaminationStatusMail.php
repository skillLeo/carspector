<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExaminationStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $examination;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected string $viewName = 'mail.status-mail';

    public function __construct($order,$examination, $user)
    {
        $this->user = $user;
        $this->order = $order;
        $this->examination=$examination;
        // Pick subject + view based on language preference
        $isEnglish = (bool) ($order->document_in_english ?? false);
        if ($isEnglish) {
            $this->subject = 'Update: Vehicle inspection completed – Documents will follow shortly';
            $this->viewName = 'mail.status-mail-en';
        } else {
            $this->subject='Update: Prüfung abgeschlossen, Unterlagen folgen in Kürze';
            $this->viewName = 'mail.status-mail';
        }
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown($this->viewName,[
            'user'=>$this->user,
            'booking'=>$this->order,
            'examination'=>$this->examination
        ]);
    }
}
