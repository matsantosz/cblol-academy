<button wire:click="logout" class="w-full text-left">
    <x-dropdown-link>
        {{ __('Log Out') }}
    </x-dropdown-link>
</button>

<?php

$logout = function () {
    auth()->guard('web')->logout();

    session()->invalidate();
    session()->regenerateToken();

    $this->redirect('/', navigate: true);
};
