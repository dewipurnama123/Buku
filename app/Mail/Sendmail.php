<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendmail extends Mailable
{
    use Queueable, SerializesModels;
    private $datamail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datamail)
    {
        $this->datamail = $datamail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['mail'] = $this->datamail;
        return $this->subject("Sari Angrek - ")->view('mail.index',$data);
    }
}
