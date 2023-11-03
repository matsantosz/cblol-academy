<div
    x-data="{ show: false }"
    x-init="$nextTick(() => show = true)"
    class="flex justify-center items-center h-[calc(100vh-81px)] bg-primary-content"
>
    <div
        x-show="show"
        x-transition.duration.500ms
        class="flex flex-col items-center"
    >
        <x-filament::icon icon="heroicon-o-information-circle" class="text-white w-36" />

        <div class="text-white font-mark tracking-wider text-4xl mt-2">
            {{ __('Em breve') }}
        </div>

        <div class="text-white text-center font-mark tracking-wider text-lg mt-2">
            <p>{{ __('Esta funcionalidade estará') }}</p>
            <p>{{ __('disponível em breve!') }}</p>
        </div>
    </div>
</div>
