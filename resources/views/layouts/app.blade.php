<!DOCTYPE html>
<html lang="pt-BR" class="bg-primary-bg">
    <x-head-layout />
    <body>
        <livewire:navigation.menu />

        <main>
            {{ $slot }}
        </main>

        @livewire('notifications')
    </body>
</html>
