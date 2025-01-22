<?php

use App\Http\Controllers\{
    AuthController,
    AdminController,
    FestivalController,
};
use App\Http\Middleware\IsAuth;
use App\Http\Middleware\IsGuest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homePage');
})->name('home');

Route::resource('festival', FestivalController::class)->only(['index', 'show']);
// Route::resource('festival', FestivalController::class)->except(['index', 'show'])->middleware(IsAuth::class);

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register')->middleware(IsGuest::class);
    Route::post('/login', 'login')->name('login')->middleware(IsGuest::class);
    Route::post('/logout', 'logout')->name('logout')->middleware(IsAuth::class);
});


Route::get('/admin/connexion', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/connexion', [AdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.clients');

Route::get('/admin/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');

Route::get('/admin/festivals', [AdminController::class, 'festivals'])->name('admin.festivals');
Route::delete('/admin/festivals/{id}', [AdminController::class, 'deleteFestival'])->name('admin.festivals.delete');

Route::get('/admin/promotions', [AdminController::class, 'promotions'])->name('admin.promotions');
Route::get('/admin/actualites', [AdminController::class, 'actualites'])->name('admin.actualites');
Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');

Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/password/verify-code', [AuthController::class, 'verifyResetCode'])->name('password.verifyCode');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');
