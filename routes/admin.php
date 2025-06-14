<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationCampaignController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'admin', 'lang'])->prefix('admin')->name('admin.')->group(function () {

    //* Dashboard *//
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //* Dashboard End *//

    //* Home *//
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    //* Home End *//

    //* Articles *//
    Route::resource('articles', ArticlesController::class);
    Route::patch('/articles/{article}/toggle-featured', [ArticlesController::class, 'toggleFeatured'])->name('articles.toggle-featured');
    Route::patch('/articles/{article}/toggle-published', [ArticlesController::class, 'togglePublished'])->name('articles.toggle-published');
    //* Articles End *//

    // * Categories *//
    Route::resource('categories', CategoryController::class);
    // * Categories End *//

    // * Donation Campaigns *//
    Route::resource('donation-campaigns', DonationCampaignController::class)->except(['show', 'create', 'edit']);
    Route::patch('/donation-campaigns/{donationCampaign}/toggle-active', [DonationCampaignController::class, 'toggleActive'])->name('donation-campaigns.toggle-active');
    Route::get('/donation-campaigns/messages', [DonationCampaignController::class, 'msgs'])->name('donation-campaigns.msgs');
    // * Donation Campaigns End *//

    // * Transactions *//
    Route::get('/transactions', [TransactionsController::class, 'index'])->name('transactions');
    // * Transactions End *//

    // * Team *//
    Route::get('/team', [TeamController::class, 'index'])->name('team');
    Route::post('/team/register', [TeamController::class, 'register'])->name('team.register');
    Route::put('/team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
    // * Team End *//

    //* Profile *//
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    //* Profile End *//

    // * Setting *//
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting/hero', [SettingController::class, 'editHero'])->name('editHero');
    // * Setting End *//

    // * Languages *//
    Route::resource('languages', LanguagesController::class);
    Route::patch('/languages/{language}/toggle-active', [LanguagesController::class, 'toggleActive'])->name('languages.toggle-active');
    // * Languages End *//

    // * Translation *//
    Route::get('/translations/{locale}', [TranslationController::class, 'edit'])->name('translations.edit');
    Route::post('/translations/{locale}/{key}', [TranslationController::class, 'update'])->name('translations.update');
    Route::delete('/translations/{id}', [TranslationController::class, 'destroy'])->name('translations.destroy');
    // * Translation End *//
});
