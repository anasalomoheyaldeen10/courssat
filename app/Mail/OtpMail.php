<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $userName;
    /**
     * Create a new message instance.
     */
    public function __construct($otp,$userName)
    {
         $this->otp=$otp ;
         $this->userName=$userName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'استعادة كلمة مرور حسابك على منصة كورسات ',
        );
    }

    /**
     * Get the message content definition.
     */
   public function build()
{
    return $this->view('email')->with(['otp'=>$this->otp,'userName'=>$this->userName]);
}

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
