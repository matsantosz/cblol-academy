<?php

namespace App\Livewire\Profile;

use App\Models\Profile;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist as BaseInfolist;
use Livewire\Component;

class Infolist extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;

    public Profile $profile;

    public function infolist(BaseInfolist $infoList): BaseInfolist
    {
        return $infoList
            ->record($this->profile)
            ->schema([
                TextEntry::make('name')
            ]);
    }
}
