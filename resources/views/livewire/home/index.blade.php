<div class="mx-auto max-w-7xl px-6 h-[500px] text-white" x-data="{ show: false }">
    <div class="flex items-center w-[60%] h-full" x-intersect="show = true">
        <div x-cloak x-show="show" x-transition.duration.500ms>
            <h1 class="text-3xl sm:text-6xl font-mark tracking-wide">
                @lang('Sua chance de se destacar como jogador.')
            </h1>

            <h2 class="sm:text-lg mt-4 font-mark tracking-wide">
                @lang('Navegue por categoria, função, elo, pontos de liga (PdL), estado e muito mais com a nossa filtragem avançada.')
            </h2>

            <a href="{{ route('explore') }}" class="mt-6 group inline-flex items-center text-md tracking-wider font-mark capitalize h-full" wire:navigate>
                <x-button.blue type="button" class="gap-2">
                    @lang('Explorar jogadores')
                    <x-filament::icon class="h-5 w-5" icon="heroicon-o-arrow-right" />
                </x-button.blue>
            </a>
        </div>

        <img
            class="w-72 hidden lg:block"
            src="{{ $this->randomEmote }}"
            alt="LoL Emote"
            x-cloak
            x-show="show"
            x-transition.duration.500ms
        />
    </div>
</div>
