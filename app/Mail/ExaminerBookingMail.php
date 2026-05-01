<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExaminerBookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $customMessage;
    public $customSubject;
    public $manualDetails;

    public function __construct($booking, $customMessage = null, $customSubject = null, array $manualDetails = [])
    {
        $this->booking = $booking;
        $this->customMessage = $customMessage;
        $this->customSubject = $customSubject;
        $this->manualDetails = $manualDetails;
    }

    public function build()
    {
        $subject = $this->customSubject ?: 'Booking Details';

        return $this->subject($subject)
            ->markdown('mail.examiner-booking', [
                'booking' => $this->booking,
                'customMessage' => $this->customMessage,
                'subjectLine' => $subject,
                'manualDetails' => $this->manualDetails,
            ]);
    }
}
