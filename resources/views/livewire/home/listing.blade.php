<div class="flex border-t border-primary-border min-h-[calc(100vh-80px)]" x-data="{ showFilters: false }">
    <div class="flex flex-1 bg-primary-content pb-5">
        <div class="flex-1 flex flex-col">
            <div class="sticky top-20 bg-primary-content flex items-center justify-between gap-3 px-6 py-5">
                <div class="hidden sm:block text-white font-mark tracking-wider truncate">
                    Resultados ({{ $profiles->total() }})
                </div>

                <div class="flex flex-1 sm:flex-none">
                    <div
                        x-data="{ search: @entangle('search').live }"
                        class="flex items-center rounded-full overflow-hidden w-full sm:w-48 lg:w-72 bg-white"
                    >
                        <div class="h-full flex items-center justify-center px-2">
                            <x-filament::icon icon="heroicon-m-magnifying-glass" class="h-6 w-6 text-primary-gray" />
                        </div>

                        <input
                            type="text"
                            x-model.debounce.500ms="search"
                            placeholder="{{ __('Search') }}"
                            class="pl-0 pr-0 w-full text-primary-content focus-within:ring-0 focus-within:border-primary-border font-mark placeholder:text-sm border-none tracking-wider"
                        />

                        <button x-show="search" @click="search = ''" class="h-full flex items-center justify-center px-2">
                            <x-filament::icon icon="heroicon-m-x-mark" class="h-5 w-5 text-primary-gray" />
                        </button>
                    </div>

                    <button class="relative ml-2" title="{{ __('Filters') }}" @click="showFilters = !showFilters">
                        <x-filament::icon icon="heroicon-o-adjustments-horizontal" class="w-8 h-8 text-white" />

                        <div class="absolute top-0 -right-1 w-4 h-4 text-xs font-mark text-white bg-primary-menu rounded-md border border-primary-border">
                            {{ $this->filtersCount }}
                        </div>
                    </button>
                </div>
            </div>

            @if ($profiles->count() > 0)
                <div class="flex flex-col divide-y divide-primary-border border-y border-primary-border">
                    @foreach ($profiles as $profile)
                        <a href="{{ route('profile.show', $profile) }}" class="px-6 py-8 hover:bg-primary-bg" wire:navigate>
                            <div class="flex items-center gap-4">
                                <div class="max-w-[120px]">
                                    <img
                                        alt="Foto de {{ $profile->name }}"
                                        src="{{ $profile->photo_url }}"
                                        class="w-24 rounded-full"
                                    />
                                </div>

                                <div>
                                    <div class="text-white text-lg">
                                        {{ $profile->name }}
                                    </div>

                                    <div class="text-gray-200 text-xs">
                                        {{ '@' }}{{ $profile->handle }}
                                    </div>

                                    <div class="flex items-end text-white text-sm gap-1.5 mt-2">
                                        <x-filament::icon icon="heroicon-o-home" class="h-5 w-5" />
                                        <div class="text-xs">{{ $profile->state }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <x-empty-state />
            @endif

            @if ($profiles->total() > 10 && $profiles->hasMorePages())
                <div class="flex justify-center mt-5">
                    <x-blue-button wire:click="loadMore" class="rounded-full !py-3 !px-12">
                        {{ __('Load More') }}
                    </x-blue-button>
                </div>
            @endif
        </div>
    </div>

    <div
        class="w-[35%] lg:w-[30%] fixed sm:static inset-0 z-20"
        x-show="showFilters"
        x-on:mousedown.self="showFilters = false"
        x-on:touchstart.self="showFilters = false"
        x-cloak
    >
        <div
            id="filters"
            class="bg-primary-bg w-4/5 sm:w-full fixed sm:sticky top-0 sm:top-20 right-0 bottom-0 sm:h-[calc(100vh-80px)] text-white z-20
            border-l border-primary-border font-mark tracking-wider overflow-y-auto"
            x-show="showFilters"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-x-full"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-end="translate-x-full"
        >
            <div class="flex items-center justify-between px-6 pt-7 pb-6">
                <div class="text-lg flex items-start gap-2">
                    <x-filament::icon icon="heroicon-o-adjustments-horizontal" class="w-6 h-6 text-white" />

                    {{ __('Filtros') }} ({{ $this->filtersCount }})
                </div>

                <button
                    wire:click.throttle.1000ms="resetFilters"
                    class="text-xs text-primary-blue"
                >
                    {{ __('Limpar') }}
                </button>
            </div>

            <section class="border-y border-primary-border">
                <div
                    x-data="{ state: @entangle('state') }"
                    class="p-6 border-l-4 border-transparent transition duration-300"
                    :class="{ '!border-primary-blue': !!state }"
                >
                    <x-select
                        :label="__('State')"
                        :options="App\Enums\State::options()"
                        :placeholder="__('Selecione um estado')"
                        wire:model.live="state" />
                </div>
            </section>
        </div>
    </div>
</div>
