<div x-data="{ show: false }" class="text-white">
    <div
        x-intersect="show = true"
        x-intersect:leave="show = false"
        class="mx-auto max-w-7xl flex items-center gap-12 p-12 sm:p-16 h-[500px]"
    >
        <div class="lg:w-[65%]"
            x-cloak
            x-show="show"
            x-transition.duration.500ms
        >
            <h1 class="text-3xl sm:text-5xl font-mark tracking-wide">
                @lang('Lista de Profissionais')
            </h1>

            <h2 class="sm:text-lg mt-4 font-mark tracking-wide">
                @lang('Seu time precisa de muito mais do que apenas jogadores, aqui você encontra nossa lista de profissionais prontos para somar em um time de League of Legends.')
            </h2>

            <h2 class="mt-6 font-mark tracking-wide">
                @lang('Escolha uma categoria abaixo')
            </h2>

            <div class="flex flex-wrap gap-2 mt-4" x-data="{ category: @entangle('category') }">
                @foreach (App\Enums\Category::cases() as $item)
                    <button @click="
                            if (category === @js($item)) return;
                            @this.switchCategory(@js($item))
                        "
                        class="rounded p-3 border-2 border-primary-border text-sm tracking-wide hover:bg-primary-border"
                        :class="{ 'bg-primary-border': category === @js($item) }"
                        title="{{ __($item->value) }}"
                    >
                        @lang($item->value)
                    </button>
                @endforeach
            </div>
        </div>

        <img src="{{ $this->randomEmote }}"
            alt="LoL Emote"
            x-cloak
            x-show="show"
            x-transition.duration.500ms
            class="w-72 hidden lg:block"
        />
    </div>

    <livewire:home.listing :$category lazy />
</div>
