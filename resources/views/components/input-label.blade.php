@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white']) }}>
    {{ $value }}
</label>
