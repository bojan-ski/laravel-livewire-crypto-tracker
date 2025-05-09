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
    public $profits = [];
    public ?string $error = null;

    // initial setup
    public function mount(): void
    {
        $this->fetchPortfolioItems();
        $this->calculateProfit();
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

    // calculate profits func
    public function calculateProfit(): void
    {
        $this->profits = $this->groupedItems->map(function ($items) {
            $totalSpend = $items->sum('total_spend');
            $totalReceived = $items->sum('total_received');
            return $totalReceived - $totalSpend;
        });
    }

    // render view
    public function render(): View
    {
        return view('livewire.portfolio');
    }
}
