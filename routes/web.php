<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/m/{member:qr_key}', [MemberController::class, 'show_card']);
Route::resource('members', MemberController::class);