<?php

namespace App\Livewire;

use Livewire\Component;

class DashboardTableBodyTr extends Component
{
    public $crypto = [];

    public function mount($crypto): void
    {
        $this->crypto = $crypto;
    }
    
    public function render()
    {
        return view('livewire.dashboard-table-body-tr');
    }
}
