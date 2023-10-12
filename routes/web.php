<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Volt::route('settings', 'settings.index')
        ->name('settings');
});

require __DIR__ . '/auth.php';
