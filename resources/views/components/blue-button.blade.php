@props(['type' => 'submit'])

<button {{ $attributes->merge([
    'type' => $type,
    'class' => 'inline-flex items-center px-5 py-4 bg-primary-blue bg-opacity-90 rounded
                text-xs text-primary-menu uppercase tracking-widest hover:bg-primary-blue hover:bg-opacity-100
                transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
