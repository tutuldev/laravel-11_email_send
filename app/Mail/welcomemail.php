<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class welcomemail extends Mailable
{
    use Queueable, SerializesModels;

   public $mailmessage;
   public $subject;
//    public $details;
   private $details;
    public function __construct($message,$subject,$details)
    {
        $this->mailmessage =$message;
        $this->subject =$subject;
        $this->details =$details;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // subject: 'Welcomemail',
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // text: 'mail.welcome-mail',
            view: 'mail.welcome-mail',
            // with when using privet method 
            with:[
                'name' =>$this->details['name'],
                'product' =>$this->details['product'],
                'price' =>$this->details['price'],
            ]
        );
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
