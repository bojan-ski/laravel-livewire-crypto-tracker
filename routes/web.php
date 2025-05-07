<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\SelectedCrypto;
use App\Livewire\AddCrypto;
use App\Livewire\Portfolio;

// GUEST ONLY
Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

// AUTH ONLY
Route::middleware('auth')->group(function () {
    Route::get('/{cryptoId}/add_crypto', AddCrypto::class)->name('addCrypto');
    Route::get('/portfolio', Portfolio::class)->name('portfolio');
});

Route::get('/', Dashboard::class)->name('home');
Route::get('/{cryptoId}', SelectedCrypto::class)->name('show');
