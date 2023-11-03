<div class="p-5" x-data="{ open: false }">
    <x-blue-button x-ref="btn" x-on:click="open = !open">
        Options
        <x-filament::icon class="w-5" icon="heroicon-m-chevron-down" />
    </x-blue-button>

    <div
        class="bg-white rounded w-72"
        x-cloak
        x-show="open"
        x-on:click.away="open = false"
        x-anchor.bottom-start.offset.4="$refs.btn"
    >
        <a class="py-2 px-4 block" href="/">
            Home
        </a>

        <a class="py-2 px-4 block" href="/">
            Contact
        </a>

        <a class="py-2 px-4 block" href="/">
            Bromer
        </a>
    </div>
</div>
