<nav x-data="{ open: false }" class="bg-primary-menu border-b-2 border-primary-border text-white">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto pl-4 sm:px-4">
        <div class="flex h-[74px]">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-application-logo class="block w-14" />
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
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 transition ease-in-out duration-150">
                                    <div x-data="{ name: '{{ auth()->user()->email }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.security')" wire:navigate>
                                    {{ __('Segurança') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <button wire:click="logout" class="w-full text-left">
                                    <x-dropdown-link>
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <div class="flex sm:ml-6">
                        <x-nav-link class="text-black bg-primary-blue hover:bg-primary-blue" :href="route('login')" wire:navigate>
                            {{ __('Entrar Agora') }}
                        </x-nav-link>
                    </div>
                @endauth

                <!-- Hamburger -->
                <div class="flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center h-full px-6 text-sm font-medium font-mark uppercase leading-5 transition duration-150 ease-in-out hover:bg-primary-border hover:border-b-2 hover:border-white hover:pt-[2px]">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
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
                    <x-responsive-nav-link :href="route('profile.security')" wire:navigate>
                        {{ __('Segurança') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-left">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            </div>
        @endauth
    </div>
</nav>
