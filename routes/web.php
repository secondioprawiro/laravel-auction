<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Public Home Route (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\DashboardController;

// Public Home Route (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard Route (Protected by Auth)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Profile Route (Direct View for Volt/Livewire)
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile.edit');

// Load Auth Routes provided by Breeze
require __DIR__ . '/auth.php';
