<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CityMail extends Mailable
{
    use Queueable, SerializesModels;
    private $email,$city;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$city)
    {
        $this->city=$city;
        $this->email=$email;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.citymail',['city'=>$this->city,'email'=>$this->email]);
    }
}
