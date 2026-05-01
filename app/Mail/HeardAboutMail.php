<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HeardAboutMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$heard_about;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$heard_about)
    {
        //$this->subject='A user '.$user->email.' has filled ('.$heard_about.') the feedback form.';
        $this->subject='Feedback';
        $this->user=$user;
        $this->heard_about=$heard_about;
        //
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('mail.heard_about',['heard_about'=>$this->heard_about,'user'=>$this->user]);
    }
}
