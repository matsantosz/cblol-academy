<button wire:click="logout" class="w-full text-left">
    <x-responsive-nav-link>
        {{ __('Log Out') }}
    </x-responsive-nav-link>
</button>

<?php

$logout = function () {
    auth()->guard('web')->logout();

    session()->invalidate();
    session()->regenerateToken();

    $this->redirect('/', navigate: true);
};
