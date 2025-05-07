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
    public string $selectedCryptoDataId;
    public $selectedCryptoData = [];

    #[Validate('required|numeric')]
    public $quantity;
    #[Validate('required|numeric')]
    public $total_spend;
    #[Validate('required|numeric')]
    public $crypto_purchase_price;
    #[Validate('required|string')]
    public $purchase_currency = 'USD';

    // initial setup
    public function mount($cryptoId): void
    {
        // get selected crypto ID
        $this->selectedCryptoDataId = $cryptoId;

        // get selected crypto data from session
        if (Session::has('selectedCryptoData')) {
            $this->selectedCryptoData = Session::get('selectedCryptoData');
            // dd($this->selectedCryptoData);
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
                'crypto_purchase_price' => $this->crypto_purchase_price,
                'crypto_market_price_on_purchase' => $this->selectedCryptoData['market_data']['current_price']['usd'],
                'purchase_currency' => $this->purchase_currency,
            ]);

            // success msg
            session()->flash('status', 'Crypto added.');

            // redirect user
            $this->redirectRoute('addCrypto', ['cryptoId' => $this->selectedCryptoDataId]);
        } catch (\Exception $e) {
            dd($e);
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
