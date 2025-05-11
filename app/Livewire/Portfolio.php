<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

#[Title('Portfolio')]
class Portfolio extends Component
{
    // variables
    public $portfolioItems = [];
    public $groupedItems = [];
    public $currencyProfits = [];
    public $usdProfits = [];
    public ?string $error = null;

    // initial setup
    public function mount(): void
    {
        $this->fetchPortfolioItems();
        $this->calculateProfitBasedOnCurrency();
        $this->calculateProfitBasedOnDollar();
    }

    // get user portfolio items from database
    public function fetchPortfolioItems(): void
    {
        try {
            // get portfolio items
            $this->portfolioItems = collect(Auth::user()->portfolio->portfolioItems);
            // group portfolio items per coin_id
            $this->groupedItems = collect($this->portfolioItems)->groupBy('coin_id');
        } catch (\Exception $e) {
            $this->error = 'There was an error connecting to the database: ' . $e->getMessage();
        }
    }

    // calculate profits by coin and currency func
    public function calculateProfitBasedOnCurrency(): void
    {
        $profitsByCurrency = [];

        // group by coin_id and selected_currency
        $groupedByCoinAndCurrency = [];

        foreach ($this->portfolioItems as $item) {
            $coinId = $item['coin_id'];
            $currency = $item['selected_currency'];

            $groupedByCoinAndCurrency[$coinId][$currency][] = $item;
        }

        // calc profit for each coin_id/selected_currency
        foreach ($groupedByCoinAndCurrency as $coinId => $currencyGroups) {
            $profitsByCurrency[$coinId] = [];

            foreach ($currencyGroups as $currency => $items) {
                $allTotalSpend = 0;
                $allTotalReceived = 0;

                foreach ($items as $item) {
                    if (!is_null($item['total_spend'])) {
                        $allTotalSpend += $item['total_spend'];
                    }

                    if (!is_null($item['total_received'])) {
                        $allTotalReceived += $item['total_received'];
                    }
                }

                $profitsByCurrency[$coinId][$currency] = $allTotalReceived - $allTotalSpend;
            }
        }

        $this->currencyProfits = $profitsByCurrency;
    }

    // calculate profits by USD func
    public function calculateProfitBasedOnDollar(): void
    {
        foreach ($this->groupedItems as $coinId => $items) {
            $totalPurchase =  0;
            $totalSell = 0;

            foreach ($items as $item) {
                if (!is_null($item['crypto_purchase_price'])) {
                    $purchaseAmount = $item['quantity'] * $item['crypto_purchase_price'];
                    $totalPurchase += $purchaseAmount;
                }

                if (!is_null($item['crypto_sell_price'])) {
                    $sellAmount = $item['quantity'] * $item['crypto_sell_price'];
                    $totalSell += $sellAmount;
                }
            }

            $this->usdProfits[$coinId] = $totalSell - $totalPurchase;
        }
    }

    // render view
    public function render(): View
    {
        // dd($this->currencyProfits);
        return view('livewire.portfolio');
    }
}
