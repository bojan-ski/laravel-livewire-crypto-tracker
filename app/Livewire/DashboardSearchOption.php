<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class DashboardSearchOption extends Component
{
    // validation & variables
    #[Url(as: 'q')]
    #[Validate('required|string|min:2|max:30')]
    public string $searchTerm = '';

    public $searchedCryptoData = [];
    public ?string $error = null;

    // run search func
    public function applySearch(): void
    {
        $this->validate();

        try {
            $response = Http::get('https://api.coingecko.com/api/v3/search', [
                'query' => $this->searchTerm,
            ]);

            if ($response->successful()) {
                $this->searchedCryptoData = collect($response->json());
            } else {
                $this->error = 'Failed to fetch crypto data. API returned status: ' . $response->status();
            }
        } catch (\Exception $e) {
            $this->error = 'Error connecting to crypto API: ' . $e->getMessage();
        }

        $this->dispatch('search-for-cryptos', [
            'searchTerm' => $this->searchTerm,
            'searchedCryptoData' => $this->searchedCryptoData['coins'] ?? []
        ])->to(Dashboard::class);
    }

    // reset/clear search
    public function clearSearch(): void
    {
        $this->searchTerm = '';
        $this->dispatch('reset-search')->to(Dashboard::class);
    }

    // render view
    public function render(): View
    {
        return view('livewire.dashboard-search-option');
    }
}
