<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.index')
    ->name('home');

Volt::route('profile', 'profile.index')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
