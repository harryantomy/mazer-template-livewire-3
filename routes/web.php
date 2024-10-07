<?php

use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('counter', Counter::class)->middleware(['auth', 'role:Super Admin|Guru'])->name('counter');

require __DIR__ . '/auth.php';
