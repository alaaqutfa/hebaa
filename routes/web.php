<?php

use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ArticlesController;

Route::get('/privacy-policy', function () {
    return view('welcome');
})->name('privacy-policy');

Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/project/{article:slug}', [ArticlesController::class, 'show'])->name('project.show');
});
