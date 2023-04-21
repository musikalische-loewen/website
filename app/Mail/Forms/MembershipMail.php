<?php

namespace App\Mail\Forms;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MembershipMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     */
    public function build(): Mailable
    {
        return $this->to(config('mail.tox.address'))
            ->subject('Anfrage via Mitgliedschaftsformular')
            ->markdown('emails.forms.membership');
    }
}
