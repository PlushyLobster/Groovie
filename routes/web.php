<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homePage');
});

use App\Http\Controllers\AdminController;

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
