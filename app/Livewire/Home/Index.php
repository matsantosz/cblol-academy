<?php

namespace App\Livewire\Home;

use App\Enums\Category;
use Illuminate\Support\Facades\Vite;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public Category $category = Category::PRO_PLAYER;

    public function switchCategory(string $category): void
    {
        $this->category = Category::from($category);
    }

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
