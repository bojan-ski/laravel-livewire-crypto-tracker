<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\SelectedCrypto;

// GUEST ONLY
Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::get('/', Dashboard::class)->name('home');
Route::get('/{cryptoId}', SelectedCrypto::class)->name('show');
