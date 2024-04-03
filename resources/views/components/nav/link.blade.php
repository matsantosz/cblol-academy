<a {{ $attributes->class('group inline-flex items-center text-md tracking-wider font-mark capitalize h-full') }} wire:navigate>
    <div class="group-hover:bg-primary-gray rounded px-4 py-3">
        {{ $slot }}
    </div>
</a>
