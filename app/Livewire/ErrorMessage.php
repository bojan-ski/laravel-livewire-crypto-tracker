<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;

class ErrorMessage extends Component
{
    // variables
    public ?string $error = null;

    // initial setup
    public function mount($error): void
    {
        $this->error = $error;
    }

    // render view
    public function render(): View
    {
        return view('livewire.error-message');
    }
}
