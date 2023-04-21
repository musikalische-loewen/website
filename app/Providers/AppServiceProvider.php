<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Ticket;
use App\Observers\PostObserver;
use App\Observers\TicketObserver;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Stripe\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Post::observe(PostObserver::class);
        Ticket::observe(TicketObserver::class);
        Carbon::setLocale(config('app.locale'));
        Stripe::setApiKey(config('services.stripe.secret'));
    }
}
