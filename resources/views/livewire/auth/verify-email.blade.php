<?php

use App\Providers\RouteServiceProvider;
use Filament\Notifications\Notification;

use function Livewire\Volt\layout;

layout('layouts.guest');

$sendVerification = function () {
    if (auth()->user()->hasVerifiedEmail()) {
        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );

        return;
    }

    auth()->user()->sendEmailVerificationNotification();

    Notification::make()
        ->title(__('A new verification link has been sent to the email address you provided during registration.'))
        ->success()
        ->send();
};

$logout = function () {
    auth()->guard('web')->logout();

    session()->invalidate();
    session()->regenerateToken();

    $this->redirect('/', navigate: true);
};

?>

<div>
    <div class="mb-4 text-sm text-white">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    <div class="mt-4 flex gap-2">
        <x-primary-button wire:click="sendVerification" class="w-full justify-center">
            {{ __('Resend Verification Email') }}
        </x-primary-button>

        <x-secondary-button wire:click="logout" class="w-full justify-center">
            {{ __('Log Out') }}
        </x-secondary-butt>
    </div>
</div>
