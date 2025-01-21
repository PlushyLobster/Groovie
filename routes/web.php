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

use App\Http\Controllers\AdminController;

Route::get('/admin/auth', [AdminAuthController::class, 'showLoginForm'])->name('admin.auth');
Route::post('/admin/auth', [AdminAuthController::class, 'login'])->name('admin.auth.login');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.clients');
Route::get('/admin/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
Route::get('/admin/festivals', [AdminController::class, 'festivals'])->name('admin.festivals');
Route::get('/admin/promotions', [AdminController::class, 'promotions'])->name('admin.promotions');
Route::get('/admin/actualites', [AdminController::class, 'actualites'])->name('admin.actualites');
