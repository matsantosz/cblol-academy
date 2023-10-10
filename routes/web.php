<?php

use Livewire\Volt\Volt;

Volt::route('/', 'welcome.index')
    ->name('welcome');

Volt::route('profile', 'profile.index')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
