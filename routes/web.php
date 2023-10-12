<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Volt::route('profile', 'profile.edit')
        ->name('profile');

    Volt::route('settings', 'settings.index')
        ->name('settings');
});

require __DIR__ . '/auth.php';
