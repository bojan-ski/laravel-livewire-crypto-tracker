<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UpdatePortfolio extends Component
{
    public string $icon;
    public string $path;
    public string $selectedCryptoDataId;
    public $selectedCryptoData = [];
    public ?string $error = null;

    // initial setup
    public function mount($icon, $path, $selectedCryptoDataId, $selectedCryptoData = []): void
    {
        $this->icon = $icon;
        $this->path = $path;
        $this->selectedCryptoDataId = $selectedCryptoDataId;
        $this->selectedCryptoData = count($selectedCryptoData) === 0 ? $this->fetchSelectedCryptoData() : $selectedCryptoData;

        // dd($this->selectedCryptoData);
        // dd(count($selectedCryptoData) === 0);
    }

    // api call - fetch selected crypto data
    public function fetchSelectedCryptoData(): string|array
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
                return collect($response->json());
            } else {
                return 'Failed to fetch crypto data. API returned status: ' . $response->status();
            }
        } catch (\Exception $e) {
            return 'Error connecting to crypto API: ' . $e->getMessage();
        }
    }

    // store selected crypto data in session func
    public function storeSelectedCryptoData(): void
    {
        // store selected crypto data in session
        Session::put('selectedCryptoData', $this->selectedCryptoData);

        // redirect user
        $this->redirectRoute("$this->path", ['cryptoId' => $this->selectedCryptoDataId]);
    }

    // render view
    public function render(): View
    {
        return view('livewire.update-portfolio');
    }
}
