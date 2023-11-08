<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="CBLOL Academy - Sua porta de entrada para o cenário competitivo de League of Legends no Brasil.">
        <meta name="keywords" content="CBLOL, League of Legends, LOL, Cenário Competitivo, Campeonato Brasileiro de League of Legends">
        <meta name="author" content="CBLOL Academy">

        <link rel="shortcut icon" type="image/x-icon" href="{{ Vite::asset('resources/img/logo/sm.png') }}">

        <title>{{ isset($title) ? $title . ' - CBLOL Academy' : 'CBLOL Academy' }}</title>

        @filamentStyles
        @filamentScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body {{ $attributes }}>
        {{ $slot }}
    </body>
</html>
