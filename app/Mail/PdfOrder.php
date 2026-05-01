<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PdfOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $examination;
    public $user;
    public $hideUpsell = false;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $examination, $user, $hideUpsell = false)
    {
        $this->user = $user;
        $this->order = $order;
        $this->examination = $examination;
        $this->hideUpsell = (bool) $hideUpsell;
        $this->subject = 'Dein Prüfergebnis ist bereit | ' . ($this->order->vehicle_make_model ?? '');
        //$this->subject='Ihre Prüfung ist abgeschlossen. For Vehicle Make ModeL: '.$this->order->vehicle_type;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.pdf-mail',[
            'user'=>$this->user,
            'booking'=>$this->order,
            'examination'=>$this->examination,
            // hideUpsell is also exposed as a public property, but pass explicitly too
            'hideUpsell' => $this->hideUpsell,
        ]);
    }
}
