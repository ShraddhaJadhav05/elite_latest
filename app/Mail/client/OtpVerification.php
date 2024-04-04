<?php

namespace App\Mail\client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpVerification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $otp;
    public $email;
    public $contact_email;
    public $contact_phone;


    /**
     * Create a new message instance.
     */
    public function __construct($otp,$email,$contact_email,$contact_phone)
    {
        $this->otp              = $otp;
        $this->email            = $email;
        $this->contact_email    = $contact_email;
        $this->contact_phone    = $contact_phone;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Single-Use Code',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.client.otp_verification',
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
