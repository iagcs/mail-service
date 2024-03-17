<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class ReceivedPayment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function  __construct(
        public array $data,
    ) {}

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.payments.received',
            with: [
                'payee_name' => $this->data['payee']['name'],
                'payer_name' => $this->data['payer']['name'],
                'transaction_value' => $this->data['value']
            ]
        );
    }
}
