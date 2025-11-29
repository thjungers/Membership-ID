<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/m/{member:qr_key}', [CardController::class, 'show_card'])->name('card.show');
Route::get('/m/{member:qr_key}/details', [CardController::class, 'prompt_pin'])->name('card.prompt');
Route::post('/m/{member:qr_key}/details', [CardController::class, 'show_details'])->name('card.details');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/generate/{member:id}', [MemberController::class, 'generate_image']);
    Route::get('/send-mail/{member:id}', [MemberController::class, 'send_mail']);
    Route::resource('members', MemberController::class);
});

require __DIR__.'/auth.php';
