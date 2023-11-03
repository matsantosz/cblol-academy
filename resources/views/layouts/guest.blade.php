<x-layout x-data="{ show: false }" x-init="$nextTick(() => show = true)">
    <div class="min-h-screen flex flex-col justify-center items-center px-4 xs:px-0">
        <a href="/" wire:navigate>
            <x-application-logo class="w-36" />
        </a>

        <main
            x-cloak
            x-show="show"
            x-transition.duration.500ms
            class="w-full xs:max-w-md xs-4 mt-6 p-10 bg-primary-content border border-primary-border"
        >
            {{ $slot }}
        </main>
    </div>

    @livewire('notifications')
</x-layout>
