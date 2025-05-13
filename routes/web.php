<?php

use App\Livewire\User\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Users\Index;

Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/users', Index::class)->name('users.index');

    Route::get('/participants', \App\Livewire\Participants\Index::class)->name('participants.index');

    Route::get('/user/profile', Profile::class)->name('user.profile');
});

require __DIR__.'/auth.php';
