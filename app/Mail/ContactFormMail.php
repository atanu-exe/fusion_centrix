<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $subject;
    public $user_message;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->name = $mailData->name;
        $this->email = $mailData->email;
        $this->subject = $mailData->subject;
        $this->user_message = $mailData->message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
             from: new Address($this->email,  $this->name),
            subject: 'Contact form - '.$this->subject ?? 'New Contact Form Message',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact', // your Blade view
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'user_message' => $this->user_message,
            ],
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
