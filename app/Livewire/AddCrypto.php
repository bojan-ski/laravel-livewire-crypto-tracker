<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\PortfolioItem;

class AddCrypto extends Component
{
    // variables
    public string $selectedCryptoDataId;
    public $selectedCryptoData = [];
    public ?string $error = null;

    // form validation and variables
    #[Validate('required|numeric')]
    public $quantity;
    #[Validate('required|numeric')]
    public $total_spend;
    #[Validate('required|numeric')]
    public $crypto_purchase_price;
    #[Validate('required|string')]
    public $selected_currency = 'USD';

    // initial setup
    public function mount($cryptoId): void
    {
        // get selected crypto ID
        $this->selectedCryptoDataId = $cryptoId;

        // get selected crypto data from session
        if (Session::has('selectedCryptoData')) {
            $sessionData = Session::get('selectedCryptoData');

            if(is_array($sessionData)){
                $this->selectedCryptoData = $sessionData;
            }else{
                $this->error = $sessionData;
            }
        }
    }

    // add crypto to portfolio func
    public function addCryptoToPortfolio()
    {
        // validate form data
        $this->validate();

        try {
            // add new portfolio item
            PortfolioItem::create([
                'portfolio_id' => Auth::user()->portfolio->id,
                'coin_id' => $this->selectedCryptoDataId,
                'quantity' => $this->quantity,
                'total_spend' => $this->total_spend,
                'selected_currency' => $this->selected_currency,
                'crypto_purchase_price' => $this->crypto_purchase_price,
                'crypto_market_price' => $this->selectedCryptoData['market_data']['current_price']['usd'],
            ]);

            // success msg
            session()->flash('status', 'Crypto added.');

            // redirect user
            $this->redirectRoute('addCrypto', ['cryptoId' => $this->selectedCryptoDataId]);
        } catch (\Exception $e) {
            // error msg
            session()->flash('status', 'There was an error adding the crypto.');

            // redirect user
            $this->redirectRoute('addCrypto', ['cryptoId' => $this->selectedCryptoDataId]);
        }
    }

    // render view
    public function render(): View
    {
        return view('livewire.add-crypto');
    }
}
