<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state('token')->locked();

state([
    'email' => fn() => request()
        ->string('email')
        ->value(),
    'password' => '',
    'password_confirmation' => '',
]);

rules([
    'token' => ['required'],
    'email' => ['required', 'string', 'email'],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$resetPassword = function () {
    $this->validate();

    $status = Password::reset($this->only('email', 'password', 'password_confirmation', 'token'), function ($user) {
        $user
            ->forceFill([
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(60),
            ])
            ->save();

        event(new PasswordReset($user));
    });

    if ($status != Password::PASSWORD_RESET) {
        $this->addError('email', __($status));

        return;
    }

    session()->flash('status', __($status));

    $this->redirectRoute('login', navigate: true);
};

?>

<div>
    <form wire:submit="resetPassword">
        <!-- Password -->
        <div class="mt-4">
            <x-input.label for="password" :value="__('New Password')" />
            <x-input
                wire:model="password"
                id="password"
                placeholder="********"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                autofocus
            />
            <x-input.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input.label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input
                wire:model="password_confirmation"
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                placeholder="********"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <x-input.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-button.blue class="w-full justify-center">
                {{ __('Reset Password') }}
            </x-button.blue>
        </div>
    </form>
</div>
