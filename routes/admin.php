<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    //* Dashboard *//
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //* Dashboard End *//

    //* Home *//
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //* Home End *//

    //* Articles *//
    Route::resource('articles', ArticlesController::class);
    //* Articles End *//

    // * Categories *//
    Route::resource('categories', CategoryController::class);
    // * Categories End *//

    // * Transactions *//
    Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions');
    // * Transactions End *//

    // * Team *//
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    // * Team End *//

    // * Team *//
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting/hero', [SettingController::class, 'editHero'])->name('editHero');
    // * Team End *//

});
