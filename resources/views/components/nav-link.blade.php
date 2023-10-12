@props(['active' => false])
@php
$classes = $active
    ? 'inline-flex items-center px-6 text-sm font-mark uppercase bg-primary-border'
    : 'inline-flex items-center px-6 text-sm font-mark uppercase leading-5 transition duration-150 ease-in-out hover:bg-primary-border';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
