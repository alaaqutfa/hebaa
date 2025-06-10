<?php
// routes/auth.php
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware(['web', 'lang'])->group(function () {
    Route::get('/register', [RegisterController::class, 'getRegister'])->name('auth.get.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
    Route::get('/login', [LoginController::class, 'getLogin'])->name('auth.get.login');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::get('/forgot', [ForgotController::class, 'getForgot'])->name('auth.get.forgot');
    Route::post('/forgot', [ForgotController::class, 'forgot'])->name('auth.forgot');
    Route::get('/verify', [ForgotController::class, 'getVerify'])->name('auth.get.verify');
    Route::post('/verify', [ForgotController::class, 'verify'])->name('auth.verify');
    Route::get('/verify-email/{token}', [RegisterController::class, 'verifyEmail'])->name('auth.verify.email');
    Route::get('/reset', [ForgotController::class, 'getReset'])->name('auth.get.reset');
    Route::post('/reset', [ForgotController::class, 'reset'])->name('auth.reset');
    Route::any('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});
