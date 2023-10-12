<!DOCTYPE html>
<html lang="pt-BR" class="bg-primary-bg font-sans antialiased">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @filamentStyles
        @filamentScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <livewire:navigation.menu />

        <main class="max-w-7xl sm:mx-auto px-4 py-4 sm:py-8">
            {{ $slot }}
        </main>

        @livewire('notifications')
    </body>
</html>
