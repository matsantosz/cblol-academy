<nav x-data="{ open: false }" class="sticky top-0 z-20 bg-primary-menu border-b-2 border-primary-border text-white">
    <div class="max-w-7xl mx-auto">
        <div class="flex h-[72px]">
            <div class="flex">
                <a href="{{ route('home') }}" class="h-full flex items-center px-4" wire:navigate>
                    <x-application-logo class="block w-14" />
                </a>

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
                @else
                    <x-nav-link
                        class="!hidden sm:!inline-flex !h-14 justify-center rounded text-primary-menu bg-primary-blue bg-opacity-90 hover:!bg-primary-blue hover:bg-opacity-100"
                        :href="route('login')"
                        wire:navigate
                    >
                        {{ __('Entrar Agora') }}
                    </x-nav-link>
                @endauth

                <!-- Hamburger -->
                <button @click="open = !open" class="inline-flex h-full items-center px-6 text-sm transition duration-150 ease-in-out hover:bg-primary-border">
                    <x-filament::icon icon="heroicon-o-bars-3" class="h-6 w-6" />
                </button>
            </div>
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
                <!-- Responsive Settings Options -->
                <div class="space-y-2 border-t-2 border-primary-border pt-2">
                    <x-responsive-nav-link :href="route('settings.security')" icon="heroicon-o-cog-8-tooth">
                        {{ __('Configurações') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-left">
                        <x-responsive-nav-link icon="heroicon-m-arrow-left-on-rectangle">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            @else
                <div class="border-t-2 border-primary-border pt-2">
                    <x-nav-link
                        :href="route('login')"
                        class="w-full !h-14 mt-2 justify-center rounded text-primary-menu bg-primary-blue bg-opacity-90 hover:!bg-primary-blue hover:bg-opacity-100"
                    >
                        {{ __('Entrar Agora') }}
                    </x-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>

<?php

use Livewire\Volt\Component;

new class extends Component
{
    public function logout()
    {
        auth()->guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/', navigate: true);
    }
};
