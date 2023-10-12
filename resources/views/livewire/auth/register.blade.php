<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state([
    'email' => '',
    'password' => '',
    'password_confirmation' => ''
]);

rules([
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
    'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
]);

$register = function () {
    $validated = $this->validate();

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered($user = User::create($validated)));

    auth()->login($user);

    $this->redirect(RouteServiceProvider::HOME, navigate: true);
};

?>

<div>
    <form wire:submit="register">
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-2">
            <x-primary-button class="w-full justify-center">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <div class="mt-4">
            <a class="flex justify-center text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</div>
