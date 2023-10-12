@props(['type' => 'button'])

<button {{ $attributes->merge([
    'type' => $type,
    'class' => 'inline-flex items-center px-5 py-4 bg-primary-bg rounded
                text-xs text-white uppercase tracking-widest
                hover:bg-primary-menu focus:bg-primary-menu focus:outline-none
                transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
