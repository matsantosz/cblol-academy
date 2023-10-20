<?php

namespace App\Livewire\Home;

use App\Models\Profile;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    #[Url]
    public array $filters = [
        'state' => ''
    ];

    public int $perPage = 10;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function loadMore(): void
    {
        $this->perPage += 5;
    }


    #[Computed]
    public function filtersCount(): int
    {
        return collect($this->filters)
            ->push($this->search)
            ->filter()
            ->count();
    }

    public function resetFilters(): void
    {
        $this->reset('filters', 'search');
    }

    public function render()
    {
        $profiles = Profile::query()
            ->public()
            ->search($this->search)
            ->state($this->filters['state'])
            ->paginate($this->perPage);

        return view('livewire.home.index', [
            'profiles' => $profiles,
        ]);
    }
}
