<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Volt::route('settings/security', 'profile.security')
        ->name('profile.security');
});

require __DIR__ . '/auth.php';
