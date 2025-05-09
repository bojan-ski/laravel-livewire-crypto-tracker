<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class DashboardSearchResultsTable extends Component
{

    // variables
    public array $searchedCryptoData;

    // initial setup
    public function mount($searchedCryptoData): void
    {
        $this->searchedCryptoData = $searchedCryptoData;
    }

    // render view
    public function render(): View
    {
        return view('livewire.dashboard-search-results-table');
    }
}
