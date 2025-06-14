<?php

use App\Http\Controllers\Web\ArticlesController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LanguagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/privacy-policy', function () {
    return view('welcome');
})->name('privacy-policy');

Route::middleware(['web', 'lang'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/profile', [ProfileController::class, 'clientProfile'])->name('profile');
    Route::put('/profile/{id}', [ProfileController::class, 'updateProfile'])->name('update.profile');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/project/{article:slug}', [ArticlesController::class, 'show'])->name('project.show');
    Route::get('/languages/switch/{code}', [LanguagesController::class, 'switch'])->name('languages.switch');
});
