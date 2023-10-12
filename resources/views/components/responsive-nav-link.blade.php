@props(['active' => false])
@php
$classes = $active
    ? 'block w-full items-center font-mark uppercase px-4 py-3 rounded hover:bg-primary-gray'
    : 'block w-full items-center font-mark uppercase px-4 py-3 rounded hover:bg-primary-gray focus:bg-primary-gray transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
