<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home')->name('home');

Volt::route('profile/{profile}', 'profile.show')
    ->name('profile.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Volt::route('settings/profile', 'settings.profile')
        ->name('settings.profile');

    Volt::route('settings/security', 'settings.security')
        ->name('settings.security');
});

require __DIR__ . '/auth.php';
