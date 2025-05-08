<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\PortfolioItem;

class Portfolio extends Component
{
    public $portfolioItems = [];
    public ?string $error = null;

    // initial setup
    public function mount(): void
    {
        $this->fetchPortfolioItems();
    }

    // get user portfolio items from database
    public function fetchPortfolioItems(): void
    {
        try {
            $this->portfolioItems = PortfolioItem::where('portfolio_id', Auth::user()->portfolio->id)->get();
        } catch (\Exception $e) {
            $this->error = 'There was an error connecting to the database: ' . $e->getMessage();
        }
    }

    // render view
    public function render(): View
    {
        return view('livewire.portfolio');
    }
}
