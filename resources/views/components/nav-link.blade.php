@props(['active' => false])
@php
$classes = $active
    ? 'inline-flex h-full items-center px-6 text-sm tracking-wide font-mark uppercase bg-primary-border'
    : 'inline-flex h-full items-center px-6 text-sm tracking-wide font-mark uppercase leading-5 transition duration-150 ease-in-out hover:bg-primary-border';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    {{ $slot }}
</a>
