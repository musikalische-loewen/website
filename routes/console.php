<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('posts:sync', function () {
    \App\Jobs\PostSync::dispatch();
    $this->info('Job for syncing posts dispatched!');
})->purpose('Sync posts from Instagram');

Artisan::command('tickets:overview {event}', function (string $event) {
    \App\Jobs\TicketOverview::dispatchSync($event);
    $this->info('Job for generating ticket overview dispatched!');
})->purpose('Generate an overview of the tickets sold for an event');
