<?php

namespace App\Models;

use App\Mail\Forms\TicketMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

class Ticket extends Model
{

    use SoftDeletes;

    protected $fillable = ['event', 'email', 'data', 'stripe_checkout_session_id'];

    protected $casts = [
        'data' => 'array',
        'paid_at' => 'datetime'
    ];

    public function send(): void
    {
        Mail::send(new TicketMail($this));
    }

    public function getNumberAttribute(): string
    {
        return date('Y').'-'.sprintf('%04d', $this->id);
    }
}
