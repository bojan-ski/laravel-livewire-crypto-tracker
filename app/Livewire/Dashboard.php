<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class Dashboard extends Component
{
    // variables
    public $cryptoData = [];
    public int $page = 1;
    public int $perPage = 10;
    public $searchedCryptoData = [];
    public ?string $error = null;

    // initial setup
    public function mount(): void
    {
        $this->fetchCryptoData();
    }

    // api call - fetch crypto data
    public function fetchCryptoData(): void
    {
        try {
            $response = Http::get('https://api.coingecko.com/api/v3/coins/markets', [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => $this->perPage,
                'page' => $this->page,
                'sparkline' => false,
                'price_change_percentage' => '1h,24h,7d'
            ]);

            if ($response->successful()) {
                $this->cryptoData = collect($response->json());
                // dd($this->cryptoData);
            } else {
                $this->error = 'Failed to fetch crypto data. API returned status: ' . $response->status();
            }
        } catch (\Exception $e) {
            $this->error = 'Error connecting to crypto API: ' . $e->getMessage();
        }
    }

    // search for specific crypto data
    #[On('search-for-cryptos')]
    public function handleSearchCryptoData(array $payload): void
    {
        $searchTerm = $payload['searchTerm'] ?? '';
        $this->searchedCryptoData = $payload['searchedCryptoData'] ?? [];

        if ($searchTerm && count($this->searchedCryptoData) === 0) {
            $this->cryptoData = $this->searchedCryptoData;
        }
    }

    #[On('reset-search')]
    public function handleResetSearch(): void
    {
        $this->fetchCryptoData();
        $this->searchedCryptoData = [];
    }

    // sort crypto data
    #[On('sort-crypto-data')]
    public function handleSortCryptoData(object $sortedCryptoData): void
    {
        $this->cryptoData = $sortedCryptoData;
    }

    // per page change/update
    #[On('per-page-changed')]
    public function handlePerPageChange(int $newPerPageValue): void
    {
        $this->perPage = $newPerPageValue;
        $this->fetchCryptoData();
    }

    // pagination change/update
    #[On('page-changed')]
    public function handlePageChange(int $newPage): void
    {
        $this->page = $newPage;
        $this->fetchCryptoData();
    }

    // render view
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
