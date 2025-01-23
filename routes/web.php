<?php

use App\Http\Middleware\RedirectIfAdmin;
use App\Http\Middleware\RedirectIfNotAdmin;
use App\Http\Controllers\{
    AuthController,
    AdminController,
    FestivalController,
};
use App\Http\Middleware\IsAuth;
use App\Http\Middleware\IsGuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homePage');
})->name('home');

Route::resource('festival', FestivalController::class)->only(['index', 'show']);

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register')->middleware(IsGuest::class);
    Route::post('/login', 'login')->name('login')->middleware(IsGuest::class);
    Route::post('/logout', 'logout')->name('logout')->middleware(IsAuth::class);
});

Route::get('/admin', function () {
    if (Auth::guard('admin')->check()) {
        return redirect('/admin/dashboard');
    }
    return redirect('/admin/connexion');
});
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/connexion', 'showLoginForm')->name('admin.login')->middleware(RedirectIfAdmin::class);
    Route::post('/admin/connexion', 'login')->name('admin.login')->middleware(RedirectIfAdmin::class);
    Route::post('/admin/deconnexion', 'logout')->name('admin.logout')->middleware(RedirectIfNotAdmin::class);
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard')->middleware(RedirectIfNotAdmin::class);

//CLIENTS
    Route::get('/admin/clients', [AdminController::class, 'clients'])->name('admin.clients')->middleware(RedirectIfNotAdmin::class);
    Route::post('/admin/clients/activate/{id}', [AdminController::class, 'activate'])->name('admin.clients.activate')->middleware(RedirectIfNotAdmin::class);
    Route::post('/admin/clients/deactivate/{id}', [AdminController::class, 'deactivate'])->name('admin.clients.deactivate')->middleware(RedirectIfNotAdmin::class);
    Route::get('/admin/clients/{id}', [AdminController::class, 'show'])->name('admin.clients.show')->middleware(RedirectIfNotAdmin::class);
    Route::put('/admin/clients/{id}', [AdminController::class, 'update'])->name('admin.clients.update')->middleware(RedirectIfNotAdmin::class);
    Route::get('/admin/clients/autocomplete', [AdminController::class, 'autocomplete'])->name('admin.clients.autocomplete')->middleware(RedirectIfNotAdmin::class);
    Route::post('/admin/clients/add', [AdminController::class, 'addClient'])->name('admin.clients.add')->middleware(RedirectIfNotAdmin::class);
    Route::get('/admin/transactions', [AdminController::class, 'transactions'])->name('admin.transactions')->middleware(RedirectIfNotAdmin::class);

//FESTIVALS
    Route::get('/admin/festivals', [AdminController::class, 'festivals'])->name('admin.festivals')->middleware(RedirectIfNotAdmin::class);
    Route::post('/admin/festivals/add', [AdminController::class, 'addFestival'])->name('admin.festivals.add')->middleware(RedirectIfNotAdmin::class);
    Route::delete('/admin/festivals/{id}', [AdminController::class, 'deleteFestival'])->name('admin.festivals.delete')->middleware(RedirectIfNotAdmin::class);
    Route::get('/admin/festivals/{id}', [AdminController::class, 'showFestival'])->name('admin.festivals.show')->middleware(RedirectIfNotAdmin::class);
    Route::put('/admin/festivals/{id}', [AdminController::class, 'updateFestival'])->name('admin.festivals.update')->middleware(RedirectIfNotAdmin::class);

//PROMOTIONS
    Route::get('/admin/promotions', [AdminController::class, 'promotions'])->name('admin.promotions')->middleware(RedirectIfNotAdmin::class);
    Route::get('/admin/promotions', [AdminController::class, 'getOffers'])->name('admin.promotions')->middleware(RedirectIfNotAdmin::class);
    Route::post('/admin/offers/add', [AdminController::class, 'addOffer'])->name('admin.offers.add')->middleware(RedirectIfNotAdmin::class);

//NOTIFICATIONS
    Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications')->middleware(RedirectIfNotAdmin::class);

//ACTUALITES
    Route::get('/admin/actualites', [AdminController::class, 'actualites'])->name('admin.actualites')->middleware(RedirectIfNotAdmin::class);
});
//PASSWORD RESET
    Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::post('/password/verify-code', [AuthController::class, 'verifyResetCode'])->name('password.verifyCode');
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');
