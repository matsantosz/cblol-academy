<?php

namespace App\Livewire\Home;

use Illuminate\Support\Facades\Vite;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed]
    public function randomEmote(): string
    {
        $emote = random_int(1, 22);

        return Vite::asset("resources/img/emote/$emote.webp");
    }

    public function render()
    {
        return view('livewire.home.index');
    }
}
