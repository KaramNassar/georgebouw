<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| GEORGE BOUW Construction — routes
|--------------------------------------------------------------------------
| Merge these into your app's routes/web.php (the Filament admin panel
| registers its own routes separately via the panel provider — nothing
| to add here for that).
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/project/{project:slug}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/service/{service:slug}', [ServiceController::class, 'show'])->name('service.show');

Route::get('/lang/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

Route::post('/quote-requests', [QuoteRequestController::class, 'store'])->name('quote-requests.store');
Route::post('/contact-messages', [ContactMessageController::class, 'store'])->name('contact-messages.store');
