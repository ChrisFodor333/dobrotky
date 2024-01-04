<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;


  public $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link)
    {
         $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('chrisfodor333@gmail.com', 'chrisfodor333@gmail.com')
              ->subject('Požiadavka na resetovanie hesla')
              ->view('emails.resetpassword');
    }
}
