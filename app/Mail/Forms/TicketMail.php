<?php

namespace App\Mail\Forms;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $ticket;

    /**
     * Create a new message instance.
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     */
    public function build(): Mailable
    {
        return $this->to($this->ticket->email)
            ->bcc('admin@musikalische-loewen.de')
            ->subject(sprintf('Kartenbestellung #%s', $this->ticket->number))
            ->markdown('emails.forms.ticket')
            ->attach(public_path('docs/postkarte_pfingstkonzert_2023.pdf'));
    }
}
