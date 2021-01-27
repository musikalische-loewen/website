<?php

use App\Http\Controllers\FormsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Form routes
Route::post('kontakt', [FormsController::class, 'contact'])->name('forms.contact');
Route::post('verein/mitgliedschaft', [FormsController::class, 'membership'])->name('forms.membership');

// Default page routes
Route::get('{path?}', PagesController::class)->where('path', '.*');
