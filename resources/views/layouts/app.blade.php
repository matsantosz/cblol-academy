<!DOCTYPE html>
<html lang="pt-BR" >
    @include('layouts.head')
    <body>
        <livewire:navigation.menu />

        <main>
            {{ $slot }}
        </main>

        @livewire('notifications')
    </body>
</html>
