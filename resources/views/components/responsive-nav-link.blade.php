@props(['active' => false])
@php
$classes = $active
    ? 'inline-flex w-full items-center font-mark px-4 py-3 bg-primary-gray rounded'
    : 'inline-flex w-full items-center font-mark px-4 py-3 hover:bg-primary-gray focus:bg-primary-gray transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
