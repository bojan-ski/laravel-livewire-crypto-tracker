<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AddCryptoOption extends Component
{
    public $selectedCryptoData = [];

    // initial setup
    public function mount($selectedCryptoData): void
    {
        $this->selectedCryptoData = $selectedCryptoData;
    }

    // store selected crypto data in session func
    public function storeSelectedCryptoData(): void
    {
        // store selected crypto data in session
        Session::put('selectedCryptoData', $this->selectedCryptoData);

        // redirect user
        $this->redirectRoute('addCrypto', ['cryptoId' => $this->selectedCryptoData['id']]);
    }

    // render view
    public function render(): View
    {
        return view('livewire.add-crypto-option');
    }
}
