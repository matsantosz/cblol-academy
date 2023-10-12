<?php

namespace App\Livewire\Profile;

use App\Models\Profile;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Split;
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
            ->query(Profile::query())
            ->paginated(false)
            ->columns([
                Split::make([
                    Tables\Columns\ImageColumn::make('photo')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('name')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('state')
                        ->icon('heroicon-o-home'),
                ]),
            ]);
    }
}
