<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\ArticlesController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\CurrencyController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LanguagesController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/currency/switch/{code}', [CurrencyController::class, 'switch'])->name('currency.switch');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
