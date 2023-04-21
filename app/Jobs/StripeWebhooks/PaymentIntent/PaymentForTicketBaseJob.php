<?php

namespace App\Jobs\StripeWebhooks\PaymentIntent;

use App\Models\Ticket;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\WebhookClient\Models\WebhookCall;
use Stripe\Checkout\Session;
use Stripe\Event;

class PaymentForTicketBaseJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $webhookCall;

    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    protected function ticket(): Ticket
    {
        $payment_intent = Event::constructFrom($this->webhookCall->payload)->data?->object;
        $checkout_sessions = Session::all(['limit' => 1, 'payment_intent' => $payment_intent->id]);
        return Ticket::where('stripe_checkout_session_id', $checkout_sessions->data[0]->id)
            ->withTrashed()
            ->firstOrFail();
    }
}
