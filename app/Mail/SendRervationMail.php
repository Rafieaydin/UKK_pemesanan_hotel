<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRervationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $links;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($links)
    {
        $this->links = $links;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reservation')->subject('Detail Reservasi')->with(['links'=>$this->links]);
    }
}
