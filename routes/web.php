<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Form routes
Route::post('karten', [TicketController::class, 'store'])->name('forms.ticket');
Route::get('karten/success', [TicketController::class, 'storeSuccess'])->name('forms.ticket.success');
Route::get('karten/cancel', [TicketController::class, 'storeError'])->name('forms.ticket.cancel');
Route::post('kontakt', [FormsController::class, 'contact'])->name('forms.contact');
Route::post('verein/mitgliedschaft', [FormsController::class, 'membership'])->name('forms.membership');

// Default page routes
Route::get('{path?}', PagesController::class)->where('path', '.*');
