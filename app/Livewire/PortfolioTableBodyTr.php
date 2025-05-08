<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class PortfolioTableBodyTr extends Component
{
    public $item = [];

    public function mount($item): void
    {
        $this->item = $item;
    }

    public function render(): View
    {
        return view('livewire.portfolio-table-body-tr');
    }
}
