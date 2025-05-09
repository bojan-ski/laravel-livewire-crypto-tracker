<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class PopUpMessage extends Component
{
    public function render(): View
    {
        return view('livewire.pop-up-message');
    }
}
