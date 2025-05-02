<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class DashboardSelectPerPageOption extends Component
{
    public function setPerPage($value)
    {
        // check if user has altered the html
        $validator = Validator::make(['selectPerPage' => $value], [
            'selectPerPage' => 'required|in:10,25,50',
        ]);

        if ($validator->fails()) return $value = 10;

        // if all is good
        $this->dispatch('per-page-changed', $value)->to(Dashboard::class);
    }

    public function render()
    {
        return view('livewire.dashboard-select-per-page-option');
    }
}
