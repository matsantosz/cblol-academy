@props(['label', 'placeholder', 'options'])

<x-filter.wrapper>
    <div class="relative" x-data="{ open: false, modelValue: @entangle($attributes->wire('model')) }">
        <label>@lang($label)</label>

        <button x-ref="trigger" x-on:click="open = !open" class="flex items-center bg-white p-3 mt-3 w-full text-primary-menu text-left text-sm rounded">
            <template x-if="modelValue">
                <div class="flex items-center justify-between flex-1">
                    <span x-text="modelValue"></span>

                    <button x-on:click.stop="$dispatch('reset-filter', @js([$attributes->wire('model')->value]))" class="group px-1">
                        <x-filament::icon icon="heroicon-m-x-mark" class="w-5 text-primary-gray group-hover:text-black" />
                    </button>
                </div>
            </template>

            <template x-if="!modelValue">
                <span class="text-primary-gray">
                    @lang($placeholder)
                </span>
            </template>

            <x-filament::icon icon="heroicon-m-chevron-down" class="w-5 ml-auto text-primary-gray" />
        </button>

        <div
            x-show="open"
            x-anchor.bottom-start.offset.2="$refs.trigger"
            x-on:click.away="open = false"
            x-on:keydown.escape.window="open = false"
            class="bg-white w-full max-h-52 overflow-y-auto rounded p-1.5"
            data-filter-select
        >
            @foreach ($options as $option)
                <button
                    x-on:reset-filter="open = false"
                    x-on:filter-changed="open = false"
                    x-on:click="$dispatch('filter-changed', @js([$attributes->wire('model')->value, $option]))"
                    class="text-primary-content w-full px-3 py-2 text-left hover:bg-[#bbeded] rounded"
                >
                    {{ $option }}
                </button>
            @endforeach
        </div>
    </div>
</x-filter.wrapper>
