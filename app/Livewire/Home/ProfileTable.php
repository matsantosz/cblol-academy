<?php

namespace App\Livewire\Home;

use App\Enums\State;
use App\Models\Profile;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Component;

class ProfileTable extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Profile::query()->public())
            ->paginated(fn () => $this->getAllTableRecordsCount() > 10)
            ->paginationPageOptions([10])
            ->recordUrl(fn (Profile $profile) => route('profile.show', $profile))
            ->columns([
                Split::make([
                    Tables\Columns\ImageColumn::make('photo')
                        ->grow(false)
                        ->size(120)
                        ->defaultImageUrl($this->getDefaultImageUrl(...)),
                    Stack::make([
                        Tables\Columns\TextColumn::make('name')
                            ->size(TextColumnSize::Large)
                            ->searchable(),
                        Tables\Columns\TextColumn::make('state')
                            ->size(TextColumnSize::ExtraSmall)
                            ->icon('heroicon-o-home'),
                    ])->space(1),
                ]),
            ])
            ->filters([
                SelectFilter::make('state')
                    ->options(State::class)
                    ->placeholder('Estado')
                    ->searchable()
                    ->native(false)
                    ->translateLabel(),
            ])
            ->filtersFormWidth('sm')
            ->filtersTriggerAction(fn (Action $action) => $action
                ->button()
                ->icon('heroicon-s-adjustments-horizontal')
                ->hiddenLabel());
    }

    private function getDefaultImageUrl(Profile $profile): string
    {
        $name = trim(collect(explode(' ', $profile->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';
    }
}
