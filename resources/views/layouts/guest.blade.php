<!DOCTYPE html>
<html lang="pt-BR" class="bg-primary-bg">
    <x-head />
    <body>
        <div class="min-h-screen flex flex-col justify-center items-center px-4 xs:px-0">
            <a href="/" wire:navigate>
                <x-application-logo class="w-36" />
            </a>

            <div class="w-full xs:max-w-md xs-4 mt-6 p-10 bg-white shadow-md overflow-hidden">
                {{ $slot }}
            </div>
        </div>

        @livewire('notifications')
    </body>
</html>
