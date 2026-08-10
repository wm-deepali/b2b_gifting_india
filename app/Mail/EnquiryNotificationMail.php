<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $enquiryType;
    public array $data;

    public function __construct(string $enquiryType, array $data)
    {
        $this->enquiryType = $enquiryType;
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New ' . $this->enquiryType . ' Received',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.enquiry-notification',
        );
    }
}