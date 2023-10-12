<nav x-data="{ open: false }" class="bg-primary-menu border-b-2 border-primary-border text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto pl-4 sm:px-4">
        <div class="flex h-[74px]">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-application-logo class="block w-16" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:ml-6 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                        {{ __('Início') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex ml-auto">
                @auth
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-filament::dropdown placement="top-end">
                            <x-slot name="trigger">
                                <div
                                    x-text="name"
                                    x-data="{ name: '{{ auth()->user()->email }}' }"
                                    x-on:profile-updated.window="name = $event.detail.name">
                                </div>
                            </x-slot>

                            <x-filament::dropdown.list>
                                <x-filament::dropdown.list.item tag="a" :href="route('settings')" icon="heroicon-o-cog-8-tooth">
                                    @lang('Configurações')
                                </x-filament::dropdown.list.item>

                                <x-filament::dropdown.list.item wire:click="logout" icon="heroicon-o-arrow-left-on-rectangle">
                                    @lang('Logout')
                                </x-filament::dropdown.list.item>
                            </x-filament::dropdown.list>
                        </x-filament::dropdown>
                    </div>
                @else
                    <div class="hidden sm:flex sm:items-center">
                        <x-nav-link
                            class="h-14 gap-2 rounded text-primary-menu bg-primary-blue bg-opacity-90 hover:bg-primary-blue hover:bg-opacity-100"
                            :href="route('login')"
                            wire:navigate
                        >
                            {{ __('Entrar Agora') }}
                        </x-nav-link>
                    </div>
                @endauth

                <!-- Hamburger -->
                <div class="flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center h-full px-6 text-sm transition duration-150 ease-in-out hover:bg-primary-border">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        x-cloak
        x-show="open"
        x-trap="open"
        x-transition.opacity
        class="absolute inset-0 bg-opacity-60 bg-black z-50"
    >
        <div
            @click.outside="open = false"
            class="absolute inset-y-0 right-0 left-0 xs:left-auto xs:w-[433px] p-5 bg-primary-menu-responsive"
        >
            <div class="flex items-center justify-between mb-8">
                <x-application-logo-sm class="w-12" />

                <button @click="open = false" class="bg-primary-red hover:bg-primary-red-active rounded-xl p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="pb-3 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                    {{ __('Início') }}
                </x-responsive-nav-link>
            </div>

            @auth
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800" x-data="{ name: '{{ auth()->user()->email }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                        <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('settings')" wire:navigate>
                            {{ __('Configurações') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-left">
                            <x-responsive-nav-link>
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </button>
                    </div>
                </div>
            @else
                <div>
                    <x-nav-link
                        class="w-full h-14 mt-4 justify-center gap-2 rounded text-primary-menu bg-primary-blue bg-opacity-90 hover:bg-primary-blue hover:bg-opacity-100"
                        :href="route('login')"
                        wire:navigate
                    >
                        {{ __('Entrar Agora') }}
                    </x-nav-link>
                </div>
            @endauth
        </div>
    </div>
</nav>
