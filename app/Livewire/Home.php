<?php

namespace App\Livewire;

use App\Models\Profile;
use Livewire\Attributes\Url;
use Livewire\Component;

class Home extends Component
{
    #[Url]
    public string $search = '';

    public function render()
    {
        $profiles = Profile::query()
            ->public()
            ->search($this->search)
            ->paginate();

        return view('livewire.home', [
            'profiles' => $profiles,
        ]);
    }
}
