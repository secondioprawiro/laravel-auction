<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AuctionShow;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/auction/{item}', AuctionShow::class)->name('auction.show');

require __DIR__.'/auth.php';
