<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/event/store', [CalendarController::class, 'store']);
    Route::get('/get-events', [CalendarController::class, 'create']);
    Route::delete('/event/destroy/{calendar}', [CalendarController::class, 'destroy']);
    Route::put('/event/update/{calendar}', [CalendarController::class, 'update']);

    Route::get('/pay-with-stripe', [StripeController::class, 'checkout'])->name('stripe.payement');
});

require __DIR__.'/auth.php';
