<div {{ $attributes->class('p-6 border-l-4 border-transparent transition duration-300') }} :class="{ '!border-primary-blue': !!modelValue }">
    {{ $slot }}
</div>
