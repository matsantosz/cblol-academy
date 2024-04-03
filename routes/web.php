<?php

use App\Livewire\Explore;
use App\Livewire\Home;
use App\Livewire\Profile;
use App\Livewire\Settings;
use App\Livewire\Support;

Route::get('/', Home\Index::class)->name('home');

Route::get('/explore', Explore\Index::class)->name('explore');

Route::get('/@{profile:handle}', Profile\Show::class)->name('profile.show');

Route::get('/support', Support\Index::class)->name('support');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/settings', Settings\Index::class)->name('settings');
});

require __DIR__ . '/auth.php';
