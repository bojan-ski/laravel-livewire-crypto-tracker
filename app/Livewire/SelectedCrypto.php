<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SelectedCrypto extends Component
{ 
    public string $selectedCryptoDataId;
    public $selectedCryptoData = [];
    public ?string $error = null;

    // initial setup
    public function mount($cryptoId): void
    {
        $this->selectedCryptoDataId = $cryptoId;
        $this->fetchSelectedCryptoData();
    }

    // api call - fetch selected crypto data
    public function fetchSelectedCryptoData(): void
    {
        try {
            $response = Http::get("https://api.coingecko.com/api/v3/coins/{$this->selectedCryptoDataId}", [
                'localization' => 'false',
                'tickers' => 'false',
                'market_data' => 'true',
                'community_data' => 'false',
                'developer_data' => 'false',
                'sparkline' => true,
            ]);

            if ($response->successful()) {
                $this->selectedCryptoData = collect($response->json());
                // dd($this->selectedCryptoData);
            } else {
                $this->error = 'Failed to fetch crypto data. API returned status: ' . $response->status();
            }
        } catch (\Exception $e) {
            $this->error = 'Error connecting to crypto API: ' . $e->getMessage();
        }
    }

    // render view
    public function render()
    {
        return view('livewire.selected-crypto');
    }
}
