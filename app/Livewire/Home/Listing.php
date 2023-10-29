<?php

namespace App\Livewire\Home;

use App\Enums\Category;
use App\Models\Profile;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class Listing extends Component
{
    use WithPagination;

    public int $perPage = 10;

    public string $search = '';

    public ?string $state = '';

    #[Reactive]
    public Category $category;

    public function mount(): void
    {
        $this->state = session('state', '');
    }

    public function updatedState($state): void
    {
        session()->put('state', $state);
    }

    public function updatedSearch(): void
    {
        $this->reset('perPage');
    }

    public function resetFilters(): void
    {
        $this->reset('perPage', 'search', 'state');
    }

    public function loadMore(): void
    {
        $this->perPage += 5;
    }

    #[Computed]
    public function filtersCount(): int
    {
        return collect([$this->search, $this->state])
            ->filter()
            ->count();
    }

    public function render()
    {
        return view('livewire.home.listing', [
            'profiles' => Profile::query()
                ->public()
                ->state($this->state)
                ->search($this->search)
                ->paginate($this->perPage),
        ]);
    }
}
