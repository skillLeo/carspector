<?php

namespace App\Mail;

use App\Models\NewBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var \App\Models\NewBooking */
    public $booking;

    /** @var array */
    public $monthLabels;

    public function __construct(NewBooking $booking, array $monthLabels = [])
    {
        $this->booking = $booking;
        $this->monthLabels = $monthLabels;
    }

    public function build(): self
    {
        return $this->subject('Bestätigung deiner Kfz-Zulassung')
            ->markdown('mail.new-booking-confirmation', [
                'booking' => $this->booking,
                'monthLabels' => $this->monthLabels,
            ]);
    }
}
