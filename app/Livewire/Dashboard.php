<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Dashboard extends Component
{
    public $cryptoData = [];
    public $isLoading = true;
    public $error = null;

    public function mount()
    {
        $this->fetchCryptoData();
    }

    public function fetchCryptoData()
    {
        $this->isLoading = true;

        try {
            $response = Http::get('https://api.coingecko.com/api/v3/coins/markets', [
                'vs_currency' => 'usd',
                'order' => 'market_cap_desc',
                'per_page' => 10,
                'page' => 1,
                'sparkline' => false,
                'price_change_percentage' => '1h,24h,7d'
            ]);

            if ($response->successful()) {
                $this->cryptoData = $response->json();
            } else {
                $this->error = 'Failed to fetch crypto data. API returned status: ' . $response->status();
            }
        } catch (\Exception $e) {
            $this->error = 'Error connecting to crypto API: ' . $e->getMessage();
        }
        
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
