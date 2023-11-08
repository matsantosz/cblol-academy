<?php

namespace App\Livewire\Home;

use App\Models\Profile;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Listing extends Component
{
    use WithPagination;

    public int $perPage = 10;

    public string $search = '';

    public string $state = '';

    #[Computed]
    public function filterCount(): int
    {
        return collect([$this->search, $this->state])
            ->filter()
            ->count();
    }

    #[On('reset-filters')]
    public function resetFilters(): void
    {
        $this->reset('search', 'state');
    }

    #[On('reset-filter')]
    public function resetFilter(string $filter): void
    {
        $this->reset($filter);
    }

    #[On('filter-changed')]
    public function filterChanged(string $key, mixed $value): void
    {
        $this->$key = $value;
    }

    public function loadMore(): void
    {
        $this->perPage += 10;
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
