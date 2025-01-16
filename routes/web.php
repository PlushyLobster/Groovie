<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAuth;
use App\Http\Middleware\IsGuest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homePage');
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register')->middleware(IsGuest::class);
    Route::post('/login', 'login')->name('login')->middleware(IsGuest::class);
    Route::post('/logout', 'logout')->name('logout')->middleware(IsAuth::class);
});
