<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

use function Livewire\Volt\rules;
use function Livewire\Volt\state;

state([
    'current_password' => '',
    'password' => '',
    'password_confirmation' => '',
]);

rules([
    'current_password' => ['required', 'string', 'current_password'],
    'password' => ['required', 'string', Password::defaults(), 'confirmed'],
]);

$updatePassword = function () {
    try {
        $validated = $this->validate();
    } catch (ValidationException $e) {
        $this->reset('current_password', 'password', 'password_confirmation');

        throw $e;
    }

    auth()
        ->user()
        ->update([
            'password' => Hash::make($validated['password']),
        ]);

    $this->reset('current_password', 'password', 'password_confirmation');

    Notification::make()
        ->title(__('Saved successfully!'))
        ->success()
        ->send();
};

?>

<section>
    <header>
        <h2 class="text-lg text-white">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-xs text-gray-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div>
            <x-input.label for="current_password" :value="__('Current Password')" />
            <x-input
                wire:model="current_password"
                id="current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="current-password"
            />
            <x-input.error :messages="$errors->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input.label for="password" :value="__('New Password')" />
            <x-input
                wire:model="password"
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />
            <x-input.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input.label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input
                wire:model="password_confirmation"
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                autocomplete="new-password"
            />
            <x-input.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-button.blue type="submit">
                {{ __('Save') }}
            </x-button.blue>
        </div>
    </form>
</section>
