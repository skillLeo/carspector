<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name,$email,$msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$msg)
    {
        $this->email=$email;
        $this->msg=$msg;
        $this->name=$name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.contact',['email'=>$this->email,'msg'=>$this->msg,'name'=>$this->name]);
    }
}
