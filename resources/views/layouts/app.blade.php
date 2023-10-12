<!DOCTYPE html>
<html lang="pt-BR" class="bg-primary-bg font-sans antialiased">
    <x-head />
    <body>
        <livewire:navigation.menu />

        <main>
            {{ $slot }}
        </main>

        @livewire('notifications')
    </body>
</html>
