<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class Filters extends Component
{
    #[Reactive]
    public string $state;

    #[Reactive]
    public int $filterCount;

    public function render()
    {
        return view('livewire.home.filters');
    }
}
