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
Route::post('kontakt', [FormsController::class, 'contact'])->name('forms.contact');
Route::post('verein/mitgliedschaft', [FormsController::class, 'membership'])->name('forms.membership');

// Rickroll people probing for common attack paths
Route::redirect('{rickroll}', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ')->whereIn('rickroll', [
    '.env', '.git', 'wp-admin', 'wp-login', 'wp-login.php', 'composer.lock', 'yarn.lock',
    'package-lock.json', 'xmlrpc.php', 'typo3', 'phpinfo.php', '.htaccess',
]);

// Default page routes
Route::get('{path?}', PagesController::class)->where('path', '.*');
