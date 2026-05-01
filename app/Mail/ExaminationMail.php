<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExaminationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $user;
    public $password;
    public $note;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking, $user, $password, $note = null)
    {
        $this->user = $user;
        $this->booking = $booking;
        $this->password=$password;
        $this->note = $note;
        $this->subject='CarCheck Zugangsdaten';
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.examination',[
            'user'=>$this->user,
            'booking'=>$this->booking,
            'password'=>$this->password,
            'note' => $this->note,
        ]);
    }
}
