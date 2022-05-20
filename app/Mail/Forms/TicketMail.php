<?php

namespace App\Mail\Forms;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->data['email'])
            ->cc('vorsitzender2@musikalische-loewen.de')
            ->bcc('kassierer@musikalische-loewen.de')
            ->bcc('admin@musikalische-loewen.de')
            ->subject('Kartenvorverkauf')
            ->markdown('emails.forms.tickets');
    }
}
