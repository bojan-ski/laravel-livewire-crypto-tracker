<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Http;

class Dashboard extends Component
{
    public $cryptoData = [];
    public $page = 1;
    public $perPage = 10;
    public $error = null;

    // initial fetch
    public function mount()
    {
        $this->fetchCryptoData();
    }

    // api call - fetch crypto data
    public function fetchCryptoData()
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
                $this->cryptoData = $response->json();
            } else {
                $this->error = 'Failed to fetch crypto data. API returned status: ' . $response->status();
            }
        } catch (\Exception $e) {
            $this->error = 'Error connecting to crypto API: ' . $e->getMessage();
        }
    }

     // per page change/update
     #[On('per-page-changed')]
     public function handlePerPageChange($newPerPageValue){
         $this->perPage = $newPerPageValue;
         $this->fetchCryptoData();
     }

    // pagiantion change/update
    #[On('page-changed')]
    public function handlePageChange($newPage){
        $this->page = $newPage;
        $this->fetchCryptoData();
    }   

    // render view
    public function render()
    {
        return view('livewire.dashboard');
    }
}
