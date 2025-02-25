<?php

use App\Http\Middleware\RedirectIfAdmin;
use App\Http\Middleware\RedirectIfNotAdmin;
use App\Http\Controllers\{AuthController, AdminController, FestivalController, TrajetController, WalletController};
use App\Http\Middleware\IsAuth;
use App\Http\Middleware\IsGuest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homePage');
})->name('home');


Route::get('/trajet', [TrajetController::class, 'trajet'])->name('trajet')->middleware(IsAuth::class);
Route::get('/trajet/experience', [TrajetController::class, 'experience'])->name('experience')->middleware(IsAuth::class);


Route::prefix('festival')->group(function () {
    Route::controller(FestivalController::class)->group(function () {
        Route::get('/mesFestivals', [FestivalController::class, 'mesFestivals'])->name('mesFestivals')->middleware(IsAuth::class);
        Route::resource('festivals', FestivalController::class)->only(['index', 'show']);
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register')->name('register')->middleware(IsGuest::class);
    Route::post('/login', 'login')->name('login')->middleware(IsGuest::class);
    Route::post('/logout', 'logout')->name('logout')->middleware(IsAuth::class);
    Route::get('/profil', 'profilRedirect')->name('profil')->middleware(IsAuth::class);
});

Route::get('/admin', function () {
    if (Auth::guard('admin')->check()) {
        return redirect('/admin/dashboard');
    }
    return redirect('/admin/connexion');
});
Route::prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::middleware(RedirectIfAdmin::class)->group(function () {
            Route::get('/connexion', 'showLoginForm')->name('admin.login');
            Route::post('/connexion', 'login')->name('admin.login');
        });

        Route::middleware(RedirectIfNotAdmin::class)->group(function () {
            Route::post('/deconnexion', 'logout')->name('admin.logout');
            Route::get('/dashboard', 'index')->name('admin.dashboard');

            // CLIENTS
            Route::prefix('clients')->group(function () {
                Route::get('/', 'clients')->name('admin.clients');
                Route::post('/activate/{id}', 'activate')->name('admin.clients.activate');
                Route::post('/deactivate/{id}', 'deactivate')->name('admin.clients.deactivate');
                Route::get('/{id}', 'show')->name('admin.clients.show');
                Route::put('/{id}', 'update')->name('admin.clients.update');
                Route::get('/autocomplete', 'autocomplete')->name('admin.clients.autocomplete');
                Route::post('/add', 'addClient')->name('admin.clients.add');
            });

            // FESTIVALS
            Route::prefix('festivals')->group(function () {
                Route::get('/', 'festivals')->name('admin.festivals');
                Route::post('/add', 'addFestival')->name('admin.festivals.add');
                Route::delete('/{id}', 'deleteFestival')->name('admin.festivals.delete');
                Route::get('/{id}', 'showFestival')->name('admin.festivals.show');
                Route::put('/{id}', 'updateFestival')->name('admin.festivals.update');
                Route::post('/importJson', 'importJson')->name('admin.festivals.importJson');
            });

            // PROMOTIONS
            Route::prefix('promotions')->group(function () {
                Route::get('/', 'promotions')->name('admin.promotions');
                Route::get('/', 'getOffers')->name('admin.promotions');
                Route::post('/offers/add', 'addOffer')->name('admin.offers.add');
                Route::get('/offers/{id}', 'showOffer')->name('admin.offers.show');
                Route::put('/offers/{id}', 'updateOffer')->name('admin.offers.update');
                Route::delete('/offers/{id}', 'deleteOffer')->name('admin.offers.delete');
            });

            // TRANSACTIONS
            Route::get('/transactions', 'transactions')->name('admin.transactions');

            // NOTIFICATIONS
            Route::get('/notifications', 'notifications')->name('admin.notifications');

            // ACTUALITES
            Route::get('/actualites', 'actualites')->name('admin.actualites');
        });
    });
});
//PASSWORD RESET
Route::prefix('password')->group(function () {
    Route::post('/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::post('/verify-code', [AuthController::class, 'verifyResetCode'])->name('password.verifyCode');
    Route::post('/reset', [AuthController::class, 'resetPassword'])->name('password.reset');
});


// WALLETCONTROLLER - PAGE PROFIL
Route::prefix('profil')->group(function () {
    Route::controller(WalletController::class)->group(function () {
        Route::middleware(IsAuth::class)->group(function () {
            Route::get('/', 'profil')->name('profil.profil');
            Route::post('/AddAvatar', 'addAvatar')->name('profil.addAvatar');
            Route::get('/redirect', 'redirectToProfil')->name('profil.redirect');
            Route::post('/cloturer', 'cloturer')->name('profil.cloturer');
            Route::post('/update', 'update')->name('profil.update');
        });
        Route::get('/wallet/useGroovies', 'useGroovies')->name('wallet.useGroovies');
    });
});

