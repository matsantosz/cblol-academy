<!DOCTYPE html>
<html lang="pt-BR" class="bg-primary-bg font-sans antialiased">
    <x-head />
    <body>
        <livewire:navigation.menu />

        <main class="max-w-7xl mx-auto py-6">
            {{ $slot }}
        </main>

        @livewire('notifications')
    </body>
</html>
