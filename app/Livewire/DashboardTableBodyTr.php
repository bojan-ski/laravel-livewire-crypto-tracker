<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class DashboardTableBodyTr extends Component
{
    // variables
    public $crypto = [];

    // initial setup
    public function mount($crypto): void
    {
        $this->crypto = $crypto;
    }
    
    // render view
    public function render(): View
    {
        return view('livewire.dashboard-table-body-tr');
    }
}
