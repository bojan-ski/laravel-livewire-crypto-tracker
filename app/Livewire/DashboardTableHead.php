<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class DashboardTableHead extends Component
{
    public $cryptoData = [];
    public string $sortField = 'market_cap_rank';
    public string $sortDirection = 'asc';

    public function mount($cryptoData): void
    {
        $this->cryptoData = $cryptoData;
    }

    public function selectedSortOption(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->applySort();
    }

    protected function applySort(): void
    {
        $this->cryptoData = collect($this->cryptoData)
            ->sortBy($this->sortField, SORT_REGULAR, $this->sortDirection === 'desc')
            ->values()
            ->all();

        $this->dispatch('sort-crypto-data', $this->cryptoData)->to(Dashboard::class);
    }

    public function render(): View
    {
        return view('livewire.dashboard-table-head');
    }
}
