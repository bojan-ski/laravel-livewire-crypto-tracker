<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\SelectedCrypto;

Route::get('/', Dashboard::class)->name('home');
Route::get('/{cryptoId}', SelectedCrypto::class)->name('show');
