<x-application.layout>
    <livewire:navigation.menu />

    <main>
        {{ $slot }}
    </main>

    @livewire('notifications')
</x-application.layout>
