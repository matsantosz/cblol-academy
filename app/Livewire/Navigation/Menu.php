<?php

namespace App\Livewire\Navigation;

use Livewire\Component;

class Menu extends Component
{
    public function logout(): void
    {
        auth()->guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect('/', navigate: true);
    }
}
