<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class PortfolioTableHead extends Component
{
    // render view
    public function render(): View
    {
        return view('livewire.portfolio-table-head');
    }
}
