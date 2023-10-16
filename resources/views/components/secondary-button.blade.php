@props(['href' => '', 'type' => 'submit'])
@php
$classes = 'inline-flex items-center px-5 py-4 bg-primary-red rounded text-xs text-white
            uppercase tracking-widest hover:bg-primary-red-active focus:bg-primary-red-active focus:outline-none
            transition ease-in-out duration-150';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => $type, 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
