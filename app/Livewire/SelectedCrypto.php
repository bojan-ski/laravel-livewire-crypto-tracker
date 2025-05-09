<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\View\View;
use App\Traits\FetchCryptoDataTrait;

#[Title('Selected Crypto')]
class SelectedCrypto extends Component
{ 
    // import helper function/trait
    use FetchCryptoDataTrait;

    // variables
    public $selectedCryptoData = [];
    public ?string $error = null;

    // initial setup
    public function mount($cryptoId): void
    {
        $apiCall = $this->fetchSelectedCryptoData($cryptoId);

        if(is_array($apiCall)){
            $this->selectedCryptoData = $apiCall;
        }else{
            $this->error = $apiCall;
        }
    }

    // render view
    public function render(): View
    {
        return view('livewire.selected-crypto');
    }
}
