@props(['active' => false])

@php
$classes = $active
    ? 'inline-flex items-center px-6 text-sm font-medium font-mark uppercase bg-primary-border hover:border-b-2 hover:border-white hover:pt-[2px]'
    : 'inline-flex items-center px-6 text-sm font-medium font-mark uppercase leading-5 transition duration-150 ease-in-out hover:bg-primary-border hover:border-b-2 hover:border-white hover:pt-[2px]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
