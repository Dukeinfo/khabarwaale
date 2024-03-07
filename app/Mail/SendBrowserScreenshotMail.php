<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendBrowserScreenshotMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    use Queueable, SerializesModels;

    public $filePath;
    public $fileName;
    public $todayDate;

    public function __construct($filePath, $fileName, $todayDate)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
        $this->todayDate = $todayDate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->todayDate . ' Webpage Screenshot',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.Screenshot',
            with: ['todayDate' => $this->todayDate]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments()
    {
        return $this->attach($this->filePath, [
            'as' => $this->fileName,
            'mime' => 'image/png'
        ]);
    }
}
