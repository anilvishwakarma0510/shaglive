<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailTemplate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $return = $this->subject($this->data['subject'])
            ->view('emails.template', $this->data);

        if (isset($this->data['attachments']) && !empty($this->data['attachments'])) {
            $return->attach($this->data['attachments']);
        }

        return $return;
    }

    /**
     * Get the message envelope.
     */
    /*public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Template',
        );
    }*/

    /**
     * Get the message content definition.
     */
    /*public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }*/

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    /*public function attachments(): array
    {
        return [];
    }*/
}
