<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;

class InvoiceSent extends Mailable
{
    use Queueable, SerializesModels;

    public Invoice $invoice;

    protected string $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct(Invoice $invoice, string $pdf)
    {
        $this->invoice = $invoice;
        $this->pdf = $pdf;
    }

    /**
     * Email Subject
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice ' . $this->invoice->invoice_number,
        );
    }

    /**
     * Email Body
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice-sent',
        );
    }

    /**
     * PDF Attachment
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(
                fn () => $this->pdf,
                $this->invoice->invoice_number . '.pdf'
            )->withMime('application/pdf'),
        ];
    }
}