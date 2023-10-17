<div>
    <div class="bg-primary-content border border-primary-border flex flex-col divide-y divide-primary-border">
        <div class="flex justify-end px-6 sm:px-4 py-4">
            <div class="bg-white flex items-center rounded overflow-hidden w-64">
                <div class="w-10 flex justify-center">
                    <x-filament::icon icon="heroicon-o-magnifying-glass" class="h-5 w-5 text-primary-gray" />
                </div>

                <input
                    type="search"
                    wire:model.live="search"
                    placeholder="Pesquisar..."
                    class="px-2 w-full focus-within:ring-0 focus-within:border-primary-border
                    text-sm border-y-0 border-r-0 border-primary-border"
                />
            </div>
        </div>

        @foreach ($profiles as $profile)
            <a href="{{ route('profile.show', $profile) }}" class="p-6 hover:bg-primary-bg" wire:navigate>
                <div class="text-white text-lg">
                    {{ $profile->name }}
                </div>

                <div class="flex items-end text-white text-sm gap-1.5 mt-1">
                    <x-filament::icon icon="heroicon-o-home" class="h-5 w-5" />
                    <div class="text-xs">{{ $profile->state }}</div>
                </div>
            </a>
        @endforeach

        {{ $profiles->links() }}
    </div>
</div>
