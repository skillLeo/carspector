<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking, $user)
    {
        $this->user = $user;
        $this->booking = $booking;
        $this->subject='Deine Buchung';
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.booking-admin',[
            'user'=>$this->user,
            'booking'=>$this->booking
        ]);
    }
}
