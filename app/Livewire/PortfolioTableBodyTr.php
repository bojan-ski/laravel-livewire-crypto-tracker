<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class PortfolioTableBodyTr extends Component
{
    // variables
    public $item = [];

    // initial setup
    public function mount($item): void
    {
        $this->item = $item;
    }

    // render view
    public function render(): View
    {
        return view('livewire.portfolio-table-body-tr');
    }
}
