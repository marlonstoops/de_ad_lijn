<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XmlController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\AdLijnController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;

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

Route::middleware(['auth:sanctum', 'verified-mobile'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // De enige echte ad lijn
    Route::post('/ad-lijn', [AdLijnController::class, 'post'])
        ->name('ad-lijn');
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/terms', [TermController::class, 'index'])->name('terms');

Route::get('/verify-phone', [WelcomeController::class, 'verifyPhone'])->name('verify-phone');
Route::get('/{id}.xml', [XmlController::class, 'index'])->name('xml');

// Mobile verification
Route::get('/mobile/verify', [VerificationController::class, 'notice'])
    ->middleware(['auth'])->name('verification.notice');

Route::get('/mobile/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed'])->name('verification.verify');

Route::post('/mobile/verification-notification', function (Request $request) {
    $request->user()->sendMobileVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
