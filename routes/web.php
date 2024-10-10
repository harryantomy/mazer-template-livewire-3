<?php

use App\Livewire\Counter;
use App\Livewire\Dashboard;
use App\Livewire\Profile\Profile;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('profil', function () {
    return view('profile');
})->middleware(['auth'])->name('profil');

Route::get('profile', Profile::class)->middleware(['auth'])->name('profile');

Route::get('counter', Counter::class)->middleware(['auth', 'role:Super Admin|Guru'])->name('counter');

require __DIR__ . '/auth.php';
