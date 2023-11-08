<div class="flex border-t border-primary-border min-h-[calc(100vh-80px)]" x-data="{ showFilters: false }">
    <div class="flex flex-1 bg-primary-content pb-5">
        <div class="flex-1 flex flex-col">
            <div class="sticky top-20 bg-primary-content flex items-center justify-between border-b border-primary-border gap-3 px-6 py-5">
                <div class="hidden sm:block text-white font-mark tracking-wider truncate">
                    Resultados ({{ $profiles->total() }})
                </div>

                <div class="flex flex-1 sm:flex-none">
                    <div class="flex items-center rounded-full overflow-hidden w-full sm:w-48 lg:w-72 bg-white" x-data="{ search: @entangle('search').live }">
                        <div class="h-full flex items-center justify-center px-2">
                            <x-filament::icon class="h-6 w-6 text-primary-gray" icon="heroicon-m-magnifying-glass" />
                        </div>

                        <input
                            class="pl-0 pr-0 w-full text-primary-content focus-within:ring-0 focus-within:border-primary-border font-mark placeholder:text-sm border-none tracking-wider"
                            type="text"
                            placeholder="{{ __('Search') }}"
                            x-model.debounce.350ms="search"
                        />

                        <button x-on:click="search = ''" x-show="search" class="h-full flex items-center justify-center px-2">
                            <x-filament::icon class="h-5 w-5 text-primary-gray" icon="heroicon-m-x-mark" />
                        </button>
                    </div>

                    <button class="relative ml-2" title="{{ __('Filters') }}" @click="showFilters = !showFilters">
                        <x-filament::icon class="w-8 h-8 text-white" icon="heroicon-o-adjustments-horizontal" />

                        <div class="absolute top-0 -right-1 w-4 h-4 text-xs font-mark text-white bg-primary-menu rounded-md border border-primary-border">
                            {{ $this->filterCount }}
                        </div>
                    </button>
                </div>
            </div>

            @if ($profiles->count() > 0)
                <div class="flex flex-col divide-y divide-primary-border border-b border-primary-border">
                    @foreach ($profiles as $profile)
                        <a class="px-6 py-5 hover:bg-primary-bg" href="{{ route('profile.show', $profile) }}" wire:navigate>
                            <div class="flex items-center gap-4">
                                <div class="w-[96px] h-[96px]">
                                    <img class="w-24 rounded-full" src="{{ $profile->photo_url }}" alt="Foto de {{ $profile->name }}" />
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
                                        <div class="text-xs">{{ $profile->state }}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <x-application.empty-state />
            @endif

            @if ($profiles->hasMorePages())
                <div class="flex justify-center mt-5">
                    <x-button.blue class="rounded-full !py-3 !px-12" wire:click="loadMore">
                        {{ __('Load More') }}
                    </x-button.blue>
                </div>
            @endif
        </div>
    </div>

    <livewire:home.filters :state="$state" :filter-count="$this->filterCount" />
</div>
