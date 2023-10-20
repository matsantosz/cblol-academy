<label {{ $attributes->class([
        'block font-normal',
        'text-negative-600'  => $hasError,
        'opacity-60'         => $attributes->get('disabled'),
        'text-white' => !$hasError,
    ]) }}>
    {{ $label ?? $slot }}
</label>
