<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class Header extends Component
{
    // render view
    public function render(): View
    {
        return view('livewire.header');
    }
}
