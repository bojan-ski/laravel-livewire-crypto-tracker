<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\PortfolioItem;

class DeductCrypto extends Component
{
    // variables
    public string $selectedCryptoDataId;
    public $selectedCryptoData = [];
    public $selectedCurrencies = [];
    public ?string $error = null;

    // form validation and variables
    #[Validate('required|numeric')]
    public $quantity;
    #[Validate('required|numeric')]
    public $total_received;
    #[Validate('required|numeric')]
    public $crypto_sell_price;
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

            if (is_array($sessionData)) {
                $this->selectedCryptoData = $sessionData;
            } else {
                $this->error = $sessionData;
            }
        }

        // get selected currencies
        $portfolio = Auth::user()->portfolio->portfolioItems;
        $this->selectedCurrencies = $portfolio->pluck('selected_currency')->unique()->values()->toArray();
    }

    // deduct crypto from portfolio func
    public function deductCryptoToPortfolio(): void
    {
        // validate form data
        $this->validate();

        try {
            // add new portfolio item
            PortfolioItem::create([
                'portfolio_id' => Auth::user()->portfolio->id,
                'coin_id' => $this->selectedCryptoDataId,
                'quantity' => $this->quantity,
                'total_received' => $this->total_received,
                'selected_currency' => $this->selected_currency,
                'crypto_sell_price' => $this->crypto_sell_price,
                'crypto_market_price' => $this->selectedCryptoData['market_data']['current_price']['usd'],
            ]);

            // success msg
            session()->flash('status', 'Crypto deducted.');

            // redirect user
            $this->redirectRoute('deductCrypto', ['cryptoId' => $this->selectedCryptoDataId]);
        } catch (\Exception $e) {
            // error msg
            session()->flash('status', 'There was an error deducting the crypto.');

            // redirect user
            $this->redirectRoute('deductCrypto', ['cryptoId' => $this->selectedCryptoDataId]);
        }
    }

    // render view
    public function render(): View
    {
        return view('livewire.deduct-crypto');
    }
}
