<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Filament\Notifications\Notification;

use function Livewire\Volt\layout;
use function Livewire\Volt\state;
use function Livewire\Volt\rules;
use function Livewire\Volt\mount;

layout('layouts.guest');

state(['email' => '', 'password' => '', 'remember' => false]);

rules([
    'email' => ['required', 'string', 'email'],
    'password' => ['required', 'string'],
    'remember' => ['boolean'],
]);

mount(function () {
    if (session()->has('status')) {
        Notification::make()
            ->title(__(session('status')))
            ->success()
            ->send();
    }
});

$login = function () {
    $this->validate();

    $throttleKey = Str::transliterate(Str::lower($this->email).'|'.request()->ip());

    if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($throttleKey);

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    if (! auth()->attempt($this->only(['email', 'password'], $this->remember))) {
        RateLimiter::hit($throttleKey);

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    RateLimiter::clear($throttleKey);

    session()->regenerate();

    $this->redirect(
        session('url.intended', RouteServiceProvider::HOME),
        navigate: true
    );
};

?>

<div>
    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')">
                <x-text-input
                    wire:model="email"
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    autocomplete="username"
                    required
                    autofocus
                />
            </x-input-label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')">
                <x-text-input
                    wire:model="password"
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    required
                />
            </x-input-label>


            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center cursor-pointer">
                <input
                    wire:model="remember"
                    id="remember"
                    type="checkbox"
                    class="rounded cursor-pointer border-gray-300 text-primary-content shadow-sm focus:ring-primary-menu"
                    name="remember"
                />

                <span class="ml-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <div class="flex gap-2 mt-2">
            <x-primary-button class="w-full justify-center">
                {{ __('Log in') }}
            </x-primary-button>

            <x-secondary-button :href="route('register')" class="w-full justify-center">
                {{ __('Register') }}
            </x-secondary-button>
        </div>

        <div class="mt-4">
            <a class="flex justify-center text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}" wire:navigate>
                {{ __('Forgot your password?') }}
            </a>
        </div>
    </form>
</div>
