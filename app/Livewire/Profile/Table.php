<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table as BaseTable;
use Livewire\Component;

class Table extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(BaseTable $table): BaseTable
    {
        return $table
            ->query(User::query())
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
            ]);
    }
}
