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

//ADMIN
Route::get('/admin/connexion', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/connexion', [AdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//CLIENTS
Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.clients');
Route::get('/admin/clients/autocomplete', [AdminController::class, 'autocomplete'])->name('admin.clients.autocomplete');
Route::post('/admin/clients/activate/{id}', [AdminController::class, 'activate'])->name('admin.clients.activate');
Route::post('/admin/clients/deactivate/{id}', [AdminController::class, 'deactivate'])->name('admin.clients.deactivate');
Route::get('/admin/clients/{id}', [AdminController::class, 'show'])->name('admin.clients.show');
Route::put('/admin/clients/{id}', [AdminController::class, 'update'])->name('admin.clients.update');
Route::get('/admin/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
//FESTIVALS
Route::get('/admin/festivals', [AdminController::class, 'festivals'])->name('admin.festivals');
Route::post('/admin/festivals/add', [AdminController::class, 'addFestival'])->name('admin.festivals.add');
Route::delete('/admin/festivals/{id}', [AdminController::class, 'deleteFestival'])->name('admin.festivals.delete');
Route::get('/admin/festivals/{id}', [AdminController::class, 'showFestival'])->name('admin.festivals.show');
Route::put('/admin/festivals/{id}', [AdminController::class, 'updateFestival'])->name('admin.festivals.update');
//PROMOTIONS
Route::get('/admin/promotions', [AdminController::class, 'promotions'])->name('admin.promotions');
Route::get('/admin/promotions', [AdminController::class, 'getOffers'])->name('admin.promotions');
Route::post('/admin/offers/add', [AdminController::class, 'addOffer'])->name('admin.offers.add');
//PASSWORD RESET
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/password/verify-code', [AuthController::class, 'verifyResetCode'])->name('password.verifyCode');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');

//NOTIFICATIONS
Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');

//ACTUALITES
Route::get('/admin/actualites', [AdminController::class, 'actualites'])->name('admin.actualites');
