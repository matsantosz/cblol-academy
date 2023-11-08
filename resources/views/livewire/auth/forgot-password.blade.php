<?php

use Illuminate\Support\Facades\Password;
use Filament\Notifications\Notification;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['email' => '']);

rules(['email' => ['required', 'string', 'email']]);

$sendPasswordResetLink = function () {
    $this->validate();

    $status = Password::sendResetLink($this->only('email'));

    if ($status != Password::RESET_LINK_SENT) {
        $this->addError('email', __($status));

        return;
    }

    $this->reset('email');

    Notification::make()
        ->title(__($status))
        ->success()
        ->send();
};

?>

<div>
    <div class="mb-4 text-sm text-white">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input.label for="email" :value="__('Email')" />
            <x-input
                wire:model="email"
                placeholder="exemplo@email.com"
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                required
                autofocus
            />
            <x-input.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-button.blue class="w-full justify-center">
                {{ __('Email Password Reset Link') }}
            </x-button.blue>
        </div>
    </form>
</div>
