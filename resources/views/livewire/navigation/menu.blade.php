@php
$logout = function (): void {
    auth()->guard('web')->logout();

    session()->invalidate();
    session()->regenerateToken();

    $this->redirect('/', navigate: true);
};
@endphp

<nav x-data="{ open: false }" class="sticky top-0 sm:z-30 bg-primary-menu border-b border-primary-border text-white">
    <div class="flex justify-between h-20">
        <nav class="flex">
            <a href="/" class="flex items-center h-full px-4" wire:navigate>
                <x-application-logo-sm class="w-14" />
            </a>

            <div class="hidden sm:flex">
                <x-nav-link :href="route('organizations')" :active="request()->routeIs('organizations')">
                    {{ __('Organizações') }}
                </x-nav-link>

                <x-nav-link href="mailto:suporte@cblol.academy">
                    <div class="flex items-center gap-1">
                        {{ __('Suporte') }}
                        <x-filament::icon icon="heroicon-m-arrow-up-right" class="w-3 text-gray-400" />
                    </div>
                </x-nav-link>

                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Preços') }}
                </x-nav-link>
            </div>
        </nav>

        <nav class="flex items-center pr-4">
            @auth
                <button @click="open = !open" class="inline-flex h-full items-center px-6 text-sm transition duration-150 ease-in-out hover:bg-primary-border">
                    <x-filament::icon icon="heroicon-o-bars-3" class="h-6 w-6" />
                </button>
            @else
                <a href="{{ route('login') }}" wire:navigate>
                    <x-blue-button class="!py-4">
                        {{ __('Entrar Agora') }}
                    </x-blue-button>
                </a>
            @endauth
        </nav>
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
        <nav
            @click.outside="open = false"
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-x-full"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-end="translate-x-full"
            class="absolute inset-y-0 right-0 left-0 xs:left-auto xs:w-[433px] p-5 bg-primary-menu-responsive"
        >
            <div class="flex items-center justify-between mb-8">
                <x-application-logo-sm class="w-12" />

                <button @click="open = false" class="bg-primary-red hover:bg-primary-red-active rounded-xl p-2">
                    <x-filament::icon icon="heroicon-m-x-mark" class="w-6 h-6" />
                </button>
            </div>

            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Início') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('organizations')" :active="request()->routeIs('organizations')">
                {{ __('Organizações') }}
            </x-responsive-nav-link>

            {{-- <x-responsive-nav-link :href="route('support')" :active="request()->routeIs('support')">
                {{ __('Suporte') }}
            </x-responsive-nav-link> --}}

            @auth
                <div class="space-y-1 border-t-2 border-primary-border pt-2">
                    <span class="px-2 uppercase tracking-wide text-xs font-mark text-gray-300 select-none">
                        Conta
                    </span>

                    <x-responsive-nav-link :href="route('settings')" icon="heroicon-o-cog-8-tooth">
                        {{ __('Configurações') }}
                    </x-responsive-nav-link>

                    <button wire:click="logout" class="w-full flex items-center gap-2 font-mark uppercase px-2 py-3 rounded hover:bg-primary-gray focus:bg-primary-gray transition duration-150 ease-in-out">
                        <x-filament::icon icon="heroicon-m-arrow-left-on-rectangle" class="w-6 h-6" />

                        {{ __('Log Out') }}
                    </button>
                </div>
            @endauth
        </nav>
    </div>
</nav>
