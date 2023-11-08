<?php

use App\Livewire\Home;
use App\Livewire\Profile;
use App\Livewire\Settings;
use App\Livewire\Support;

Route::get('/', Home\Index::class)->name('home');

Route::get('/@{profile:handle}', Profile\Show::class)->name('profile.show');

Route::get('/support', Support\Index::class)->name('support');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/settings', Settings\Index::class)->name('settings');
});

require __DIR__ . '/auth.php';
