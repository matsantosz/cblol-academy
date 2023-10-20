<a {{ $attributes }}
    class="group inline-flex h-full items-center text-sm tracking-wider font-mark uppercase"
    wire:navigate
>
    <div class="group-hover:bg-primary-gray rounded px-5 py-3">
        {{ $slot }}
    </div>
</a>
