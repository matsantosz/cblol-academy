<x-layout>
    <livewire:navigation.menu />

    <main>
        {{ $slot }}
    </main>

    @livewire('notifications')
</x-layout>
