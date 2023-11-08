<header class="sticky top-0 sm:z-30 bg-primary-menu border-b border-primary-border text-white" x-data="{ open: false }">
    <div class="flex justify-between h-20">
        <div class="flex">
            <a class="flex items-center h-full px-4" href="/" wire:navigate>
                <x-application.logo-sm class="w-14" />
            </a>

            <nav class="hidden sm:flex">
                <x-nav.link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Página Inicial') }}
                </x-nav.link>

                <x-nav.link :href="route('support')" :active="request()->routeIs('support')">
                    {{ __('Suporte') }}
                </x-nav.link>
            </nav>
        </div>

        <div class="flex items-center pr-4">
            @auth
                <button class="inline-flex h-full items-center px-6 text-sm transition duration-150 ease-in-out hover:bg-primary-border" x-on:click="open = !open">
                    <x-filament::icon class="h-6 w-6" icon="heroicon-o-bars-3" />
                </button>
            @else
                <a href="{{ route('login') }}" wire:navigate>
                    <x-button.blue class="!py-4">
                        {{ __('Entrar Agora') }}
                    </x-button.blue>
                </a>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        class="fixed inset-0 bg-opacity-75 bg-black z-50"
        x-cloak
        x-show="open"
        x-trap="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-end="opacity-100"
    >
        <nav
            class="absolute inset-y-0 right-0 left-0 xs:left-auto xs:w-[433px] p-5 bg-primary-menu-responsive"
            x-show="open"
            x-on:click.outside="open = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-x-full"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-end="translate-x-full"
        >
            <div class="flex items-center justify-between mb-8">
                <x-application.logo-sm class="w-12" />

                <button class="bg-primary-red hover:bg-primary-red-active rounded-xl p-2" x-on:click="open = false">
                    <x-filament::icon class="w-6 h-6" icon="heroicon-m-x-mark" />
                </button>
            </div>

            <x-nav.link-responsive :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Página Inicial') }}
            </x-nav.link-responsive>

            <x-nav.link-responsive :href="route('support')" :active="request()->routeIs('support')">
                {{ __('Suporte') }}
            </x-nav.link-responsive>

            @auth
                <div class="space-y-1 border-t-2 border-primary-border pt-2">
                    <span class="px-2 uppercase tracking-wide text-xs font-mark text-gray-300 select-none">
                        Conta
                    </span>

                    <x-nav.link-responsive :href="route('settings')" icon="heroicon-o-cog-8-tooth">
                        {{ __('Configurações') }}
                    </x-nav.link-responsive>

                    <button class="w-full flex items-center gap-2 font-mark uppercase px-2 py-3 rounded hover:bg-primary-gray focus:bg-primary-gray transition duration-150 ease-in-out"
                        wire:click="logout"
                    >
                        <x-filament::icon class="w-6 h-6" icon="heroicon-m-arrow-left-on-rectangle" />
                        {{ __('Log Out') }}
                    </button>
                </div>
            @endauth
        </nav>
    </div>
</header>

<?php $logout = function () {
    auth()
        ->guard('web')
        ->logout();

    session()->invalidate();
    session()->regenerateToken();

    $this->redirect('/', navigate: true);
};
