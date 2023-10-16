@props(['active' => false, 'icon' => ''])
@php
$classes = $active
    ? 'flex items-center gap-2 w-full font-mark uppercase px-4 py-3 rounded hover:bg-primary-gray'
    : 'flex items-center gap-2 w-full font-mark uppercase px-4 py-3 rounded hover:bg-primary-gray focus:bg-primary-gray transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    @if ($icon)
        <x-filament::icon :$icon class="w-6 h-6" />
    @endif

    {{ $slot }}
</a>
