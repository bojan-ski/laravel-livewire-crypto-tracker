<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class Footer extends Component
{
    // render view
    public function render(): View
    {
        return view('livewire.footer');
    }
}
