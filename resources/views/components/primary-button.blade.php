<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-5 py-4 bg-primary-content rounded
                font-semibold text-xs text-white uppercase tracking-widest
                hover:bg-primary-menu focus:bg-primary-menu focus:outline-none
                transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>
