@props(['type' => 'submit'])

<button
    {{ $attributes->merge([
        'type' => $type,
        'class' => 'inline-flex items-center p-4 bg-primary-blue rounded
                    text-white hover:bg-primary-blue-active
                    transition ease-in-out duration-150',
    ]) }}
>
    {{ $slot }}
</button>
