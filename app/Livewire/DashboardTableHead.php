<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class DashboardTableHead extends Component
{
    // variable
    public $cryptoData = [];
    public string $sortField = 'market_cap_rank';
    public string $sortDirection = 'asc';

    // initial setup
    public function mount($cryptoData): void
    {
        $this->cryptoData = $cryptoData;
    }

    // sort crypto data func
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

    // apply sort crypto data func
    protected function applySort(): void
    {
        $this->cryptoData = collect($this->cryptoData)
            ->sortBy($this->sortField, SORT_REGULAR, $this->sortDirection === 'desc')
            ->values()
            ->all();

        $this->dispatch('sort-crypto-data', $this->cryptoData)->to(Dashboard::class);
    }

    // render view
    public function render(): View
    {
        return view('livewire.dashboard-table-head');
    }
}
