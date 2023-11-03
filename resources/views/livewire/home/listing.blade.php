<div class="flex border-t border-primary-border min-h-[calc(100vh-80px)]" x-data="{ showFilters: false }">
    <div class="flex flex-1 bg-primary-content pb-5">
        <div class="flex-1 flex flex-col">
            <div
                class="sticky top-20 bg-primary-content flex items-center justify-between border-b border-primary-border gap-3 px-6 py-5">
                <div class="hidden sm:block text-white font-mark tracking-wider truncate">
                    Resultados ({{ $profiles->total() }})
                </div>

                <div class="flex flex-1 sm:flex-none">
                    <div class="flex items-center rounded-full overflow-hidden w-full sm:w-48 lg:w-72 bg-white"
                        x-data="{ search: @entangle('search').live }"
                    >
                        <div class="h-full flex items-center justify-center px-2">
                            <x-filament::icon class="h-6 w-6 text-primary-gray" icon="heroicon-m-magnifying-glass" />
                        </div>

                        <input
                            class="pl-0 pr-0 w-full text-primary-content focus-within:ring-0 focus-within:border-primary-border font-mark placeholder:text-sm border-none tracking-wider"
                            type="text"
                            placeholder="{{ __('Search') }}"
                            x-model.debounce.500ms="search"
                        />

                        <button
                            class="h-full flex items-center justify-center px-2"
                            @click="search = ''"
                            x-show="search"
                        >
                            <x-filament::icon class="h-5 w-5 text-primary-gray" icon="heroicon-m-x-mark" />
                        </button>
                    </div>

                    <button
                        class="relative ml-2"
                        title="{{ __('Filters') }}"
                        @click="showFilters = !showFilters"
                    >
                        <x-filament::icon class="w-8 h-8 text-white" icon="heroicon-o-adjustments-horizontal" />

                        <div
                            class="absolute top-0 -right-1 w-4 h-4 text-xs font-mark text-white bg-primary-menu rounded-md border border-primary-border">
                            {{ $this->filtersCount }}
                        </div>
                    </button>
                </div>
            </div>

            @if ($profiles->count() > 0)
                <div class="flex flex-col divide-y divide-primary-border border-b border-primary-border">
                    @foreach ($profiles as $profile)
                        <a
                            class="px-6 py-5 hover:bg-primary-bg"
                            href="{{ route('profile.show', $profile) }}"
                            wire:navigate
                        >
                            <div class="flex items-center gap-4">
                                <div class="w-[96px] h-[96px]">
                                    <img
                                        class="w-24 rounded-full"
                                        src="{{ $profile->photo_url }}"
                                        alt="Foto de {{ $profile->name }}"
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
                                        <x-filament::icon class="h-5 w-5" icon="heroicon-o-home" />
                                        <div class="text-xs">
                                            {{ $profile->state }}</div>
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
                    <x-blue-button class="rounded-full !py-3 !px-12" wire:click="loadMore">
                        {{ __('Load More') }}
                    </x-blue-button>
                </div>
            @endif
        </div>
    </div>

    <div class="hidden lg:block w-[30%] bg-primary-bg sticky top-20 right-0 bottom-0 h-[calc(100vh-80px)] text-white z-20 border-l border-primary-border font-mark tracking-wider overflow-y-auto"
        id="filters"
    >
        <div class="flex items-center justify-between px-6 pt-7 pb-6">
            <div class="text-lg flex items-start gap-2">
                <x-filament::icon class="w-6 h-6 text-white" icon="heroicon-o-adjustments-horizontal" />

                {{ __('Filtros') }} ({{ $this->filtersCount }})
            </div>

            <button class="text-xs text-primary-blue" wire:click.throttle.1000ms="resetFilters">
                {{ __('Limpar') }}
            </button>
        </div>

        <section class="border-y border-primary-border">
            <div
                class="p-6 border-l-4 border-transparent transition duration-300"
                :class="{ '!border-primary-blue': !!state }"
                x-data="{ state: @entangle('state') }"
            >
                <x-select
                    :label="__('State')"
                    :options="App\Enums\State::options()"
                    :placeholder="__('Selecione um estado')"
                    wire:model.live="state"
                />
            </div>
        </section>
    </div>
</div>
