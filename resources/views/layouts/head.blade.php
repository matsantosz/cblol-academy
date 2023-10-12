<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="CBLOL Academy - Sua porta de entrada para o cenário competitivo de League of Legends no Brasil.">
    <meta name="keywords" content="CBLOL, League of Legends, LOL, Cenário Competitivo, Campeonato Brasileiro de League of Legends">
    <meta name="author" content="CBLOL Academy">

    <link rel="shortcut icon" href="{{ Vite::asset('resources/img/logo/sm.png') }}" type="image/x-icon">

    <title>CBLOL Academy - Sua porta de entrada para o cenário competitivo de League of Legends no Brasil.</title>

    @filamentStyles
    @filamentScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{ $slot }}
</head>
