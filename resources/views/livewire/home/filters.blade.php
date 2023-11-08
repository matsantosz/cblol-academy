<aside data-filters
    class="hidden lg:block w-[30%] bg-primary-bg sticky top-20 right-0 bottom-0 h-[calc(100vh-80px)] text-white z-20 border-l border-primary-border font-mark tracking-wider overflow-y-auto"
>
    <div class="flex items-center justify-between px-6 pt-7 pb-6">
        <div class="text-lg flex items-start gap-2">
            <x-filament::icon class="w-6 h-6 text-white" icon="heroicon-o-adjustments-horizontal" />
            @lang('Filters') ({{ $this->filterCount }})
        </div>

        <button class="text-xs text-primary-blue" wire:click.throttle.1000ms="$parent.resetFilters()">
            @lang('Limpar')
        </button>
    </div>

    <section class="border-y border-primary-border">
        <x-filter.select
            label="State"
            placeholder="Selecione um estado"
            wire:model="state"
            :options="App\Enums\State::cases()"
        />
    </section>
</aside>
