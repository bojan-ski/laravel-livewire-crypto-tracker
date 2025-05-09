<div class="add-crypto-page mt-40">
    <div class="max-w-2xl mx-auto">

        @if($error)
            <div class="text-center bg-red-600/10 border border-red-500 text-red-400 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">
                    Error:
                </strong>
                <span class="block sm:inline">
                    {{ $error }}
                </span>
            </div>
        @else
            <div class="bg-gradient-to-br from-indigo-950 to-purple-900 rounded-2xl shadow-lg border border-white/20 p-6">

                {{-- Selected crypto data --}}
                <div class="flex items-center space-x-4 border-b border-white/10 pb-5 mb-5">
                    {{-- image --}}
                    @if($selectedCryptoData['image']['large'] ?? null)
                        <img src="{{ $selectedCryptoData['image']['large'] }}" alt="{{ $selectedCryptoData['name'] }}" class="h-20 w-20 rounded-full shadow-lg">
                    @endif

                    <div class="space-y-2">
                        {{-- name & symbol --}}
                        <h2 class="text-lg md:text-xl font-bold text-white">
                            {{ $selectedCryptoData['name'] }} ({{ strtoupper($selectedCryptoData['symbol']) }})
                        </h2>

                        {{-- rank --}}
                        <p class="text-sm md:text-base text-gray-300">
                            Rank #{{ $selectedCryptoData['market_cap_rank'] }}
                        </p>

                        {{-- ecosystem --}}
                        @if ($selectedCryptoData['asset_platform_id'])
                        <p class="text-sm md:text-base text-gray-300">
                            Ecosystem: {{ strtoupper($selectedCryptoData['asset_platform_id']) }}
                        </p>
                        @endif
                    </div>
                </div>

                {{-- Add crypto to portfolio --}}
                <form wire:submit.prevent="addCryptoToPortfolio">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        {{-- market price --}}
                        <div>
                            <label for="crypto_market_price" class="block font-medium text-gray-300">
                                Market price (USD)
                            </label>
                            <input id="crypto_market_price" type="text"
                                class="p-2 mt-2 w-full rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 shadow-sm transition"
                                placeholder="{{ number_format($selectedCryptoData['market_data']['current_price']['usd'] ?? 0, 2) }}"
                                disabled>
                            @error('crypto_market_price')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>                       

                        {{-- purchase price --}}
                        <div>
                            <label for="crypto_purchase_price" class="block font-medium text-gray-300">
                                Purchase price (USD)
                            </label>
                            <input id="crypto_purchase_price" wire:model="crypto_purchase_price" type="text"
                                class="p-2 mt-2 w-full rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 shadow-sm transition"
                                required>
                            @error('crypto_purchase_price')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div> 

                         {{-- quantity --}}
                         <div>
                            <label for="quantity" class="block font-medium text-gray-300">
                                Quantity
                            </label>
                            <input id="quantity" wire:model="quantity" type="text"
                                class="p-2 mt-2 w-full rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 shadow-sm transition"
                                required>
                            @error('quantity')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- total spend --}}
                        <div>
                            <label for="total_spend" class="block font-medium text-gray-300">
                                Total spend
                            </label>
                            <input id="total_spend" wire:model="total_spend" type="text"
                                class="p-2 mt-2 w-full rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 shadow-sm transition"
                                required>
                            @error('total_spend')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>                                               

                        {{-- currency --}}
                        <div>
                            <select wire:model="selected_currency"
                                class="w-full p-2 mt-2 rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 shadow-sm transition">
                                @foreach($selectedCryptoData['market_data']['current_price'] as $currency => $value)
                                    <option value="{{ $currency }}">
                                        {{ strtoupper($currency) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('selected_currency')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- submit btn --}}
                        <div>
                            <button type="submit"
                                class="w-full mt-2 py-2 px-4 rounded-lg text-white font-semibold bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-700 hover:brightness-110 transition duration-300 shadow-md cursor-pointer">
                                Add Crypto
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        @endif
    </div>
</div>