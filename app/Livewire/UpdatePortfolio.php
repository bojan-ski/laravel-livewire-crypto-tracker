<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use App\Traits\FetchCryptoDataTrait;

class UpdatePortfolio extends Component
{
    // import helper function/trait
    use FetchCryptoDataTrait;

    // variables
    public string $icon;
    public string $path;
    public string $selectedCryptoDataId;
    public $selectedCryptoData = [];

    // initial setup
    public function mount($icon, $path, $selectedCryptoDataId, $selectedCryptoData = []): void
    {
        $this->icon = $icon;
        $this->path = $path;
        $this->selectedCryptoDataId = $selectedCryptoDataId;
        $this->selectedCryptoData = count($selectedCryptoData) === 0 ? $this->fetchSelectedCryptoData($selectedCryptoDataId) : $selectedCryptoData;
    }

    // store selected crypto data in session func
    public function storeSelectedCryptoData(): void
    {
        // store selected crypto data in session
        Session::put('selectedCryptoData', $this->selectedCryptoData);

        // redirect user
        $this->redirectRoute("$this->path", ['cryptoId' => $this->selectedCryptoDataId]);
    }

    // render view
    public function render(): View
    {
        return view('livewire.update-portfolio');
    }
}
