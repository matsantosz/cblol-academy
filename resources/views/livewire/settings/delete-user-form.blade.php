<?php

use function Livewire\Volt\rules;
use function Livewire\Volt\state;
use function Livewire\Volt\on;

state(['password' => '']);

rules(['password' => ['required', 'string', 'current_password']]);

$deleteUser = function () {
    $this->validate();

    tap(auth()->user(), fn() => auth()->logout())->delete();

    session()->invalidate();
    session()->regenerateToken();

    $this->redirect('/', navigate: true);
};

?>

<section class="space-y-6">
    <header>
        <h2 class="text-lg text-white">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-xs text-gray-300">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-button.secondary x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </x-button.secondary>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="deleteUser" class="p-6">
            <h2 class="text-lg font-medium text-white">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-xs text-gray-300">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input.label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-input
                    wire:model="password"
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full"
                    placeholder="{{ __('Password') }}"
                />

                <x-input.error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-2">
                <x-button.primary type="button" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-button.primary>

                <x-button.secondary type="submit">
                    {{ __('Delete Account') }}
                </x-button.secondary>
            </div>
        </form>
    </x-modal>
</section>
