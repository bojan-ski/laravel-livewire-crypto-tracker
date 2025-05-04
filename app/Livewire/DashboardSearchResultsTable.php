<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardSearchResultsTable extends Component
{
    public array $searchedCryptoData;

    public function mount($searchedCryptoData): void
    {
        $this->searchedCryptoData = $searchedCryptoData;
    }

    public function render()
    {
        return view('livewire.dashboard-search-results-table');
    }
}
