<?php

namespace App\Jobs\StripeWebhooks\PaymentIntent;

use Carbon\Carbon;

class PaymentSucceeded extends PaymentForTicketBaseJob
{
    public function handle(): void
    {
        $ticket = $this->ticket();
        $ticket->restore();  # a ticket might have been deleted due to a failed payment intent, so we better restore it
        $ticket->paid_at = Carbon::now();
        $ticket->save();
    }
}
