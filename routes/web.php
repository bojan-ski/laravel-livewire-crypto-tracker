<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\SelectedCrypto;

Route::get('/', Dashboard::class)->name('home');
Route::get('/{cryptoId}', SelectedCrypto::class)->name('show');

// GUEST ONLY
Route::middleware('guest')->group(function () {
    // auth features
    Route::get('/register', [Register::class, 'register'])->name('register');
    // Route::post('/register', [AuthController::class, 'store'])->name('register.store');

    Route::get('/login', [Login::class, 'login'])->name('login');
    // Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');

    // Route::get('/forgot_password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');
    // Route::put('/forgot_password', [AuthController::class, 'resetPassword'])->name('forgotPassword.resetPassword');
});
