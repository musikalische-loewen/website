<?php

namespace App\Jobs\StripeWebhooks\PaymentIntent;

class PaymentFailedOrCancelled extends PaymentForTicketBaseJob
{
    public function handle(): void
    {
        $this->ticket()->delete();
    }
}
