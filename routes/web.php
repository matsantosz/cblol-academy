<?php

use App\Livewire\Home;
use App\Livewire\Organizations;
use App\Livewire\Profile;
use App\Livewire\Settings;

Route::get('/', Home\Index::class)->name('home');

Route::get('/@{profile:handle}', Profile\Show::class)->name('profile.show');

Route::get('/organizations', Organizations\Index::class)->name('organizations');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/settings', Settings\Index::class)->name('settings');
});

require __DIR__ . '/auth.php';
