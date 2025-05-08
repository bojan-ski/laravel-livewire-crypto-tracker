<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait FetchCryptoDataTrait
{
    // api call - fetch selected crypto data
    public function fetchSelectedCryptoData(string $selectedCryptoDataId): string|array
    {
        try {
            $response = Http::get("https://api.coingecko.com/api/v3/coins/{$selectedCryptoDataId}", [
                'localization' => 'false',
                'tickers' => 'false',
                'market_data' => 'true',
                'community_data' => 'false',
                'developer_data' => 'false',
                'sparkline' => true,
            ]);

            if ($response->successful()) {
                return $response->json();
            } else {
                return 'Failed to fetch crypto data. API returned status: ' . $response->status();
            }
        } catch (\Exception $e) {
            return 'Error connecting to crypto API: ' . $e->getMessage();
        }
    }
}
