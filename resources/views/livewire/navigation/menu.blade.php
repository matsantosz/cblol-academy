<nav x-data="{ open: false }" class="sticky top-0 z-20 bg-primary-menu border-b border-primary-border text-white">
    <div class="flex h-16">
        <div class="flex">
            <div class="flex items-center px-4">
                <x-application-logo class="w-12" />
            </div>

            <div class="hidden sm:flex">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Início') }}
                </x-nav-link>
            </div>
        </div>

        <div class="flex items-center ml-auto">
            @auth
                <x-nav-link :href="route('settings.profile')" :active="request()->routeIs('settings.profile')">
                    {{ __('Meu Perfil') }}
                </x-nav-link>

                <!-- Hamburger -->
                <button @click="open = !open" class="inline-flex h-full items-center px-6 text-sm transition duration-150 ease-in-out hover:bg-primary-border">
                    <x-filament::icon icon="heroicon-o-bars-3" class="h-6 w-6" />
                </button>
            @else
                <a href="{{ route('login') }}" wire:navigate>
                    <x-blue-button class="!py-3 mr-2">
                        {{ __('Entrar Agora') }}
                    </x-blue-button>
                </a>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        x-cloak
        x-show="open"
        x-trap="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-end="opacity-100"
        class="fixed inset-0 bg-opacity-75 bg-black z-50"
    >
        <div
            @click.outside="open = false"
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-x-[433px]"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-end="translate-x-[433px]"
            class="absolute inset-y-0 right-0 left-0 xs:left-auto xs:w-[433px] p-5 bg-primary-menu-responsive"
        >
            <div class="flex items-center justify-between mb-8">
                <x-application-logo-sm class="w-12" />

                <button @click="open = false" class="bg-primary-red hover:bg-primary-red-active rounded-xl p-2">
                    <x-filament::icon icon="heroicon-m-x-mark" class="w-6 h-6" />
                </button>
            </div>

            <x-responsive-nav-link class="mb-2" :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Início') }}
            </x-responsive-nav-link>

            @auth
                <div class="space-y-1 border-t-2 border-primary-border pt-2">
                    <span class="px-2 uppercase tracking-wide text-xs font-mark text-gray-300 select-none">
                        Conta
                    </span>

                    <x-responsive-nav-link :href="route('settings.security')" icon="heroicon-o-cog-8-tooth">
                        {{ __('Configurações') }}
                    </x-responsive-nav-link>

                    <button wire:click="logout" class="w-full flex items-center gap-2 font-mark uppercase px-2 py-3 rounded hover:bg-primary-gray focus:bg-primary-gray transition duration-150 ease-in-out">
                        <x-filament::icon icon="heroicon-m-arrow-left-on-rectangle" class="w-6 h-6" />

                        {{ __('Log Out') }}
                    </button>
                </div>
            @endauth
        </div>
    </div>
</nav>

<?php

$logout = function () {
    auth()->guard('web')->logout();

    session()->invalidate();
    session()->regenerateToken();

    $this->redirect('/', navigate: true);
};
