<div class="selected-crypto-page min-h-screen my-10">
    <div class="max-w-5xl mx-auto">

        @if($error)
            <div class="text-center bg-red-600/10 border border-red-500 text-red-400 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">
                    Error:
                </strong>
                <span class="block sm:inline">
                    {{ $error }}
                </span>
            </div>
        @elseif(!$selectedCryptoData->isEmpty())
            <div class="bg-gradient-to-br from-indigo-950 to-purple-900 rounded-2xl shadow-lg border border-white/20 p-6">

                {{-- Primary data --}}
                <div class="flex items-center space-x-6 mb-5">
                    {{-- image --}}
                    @if($selectedCryptoData['image']['large'] ?? null)
                        <img src="{{ $selectedCryptoData['image']['large'] }}" alt="{{ $selectedCryptoData->get('name') }} logo" class="h-20 w-20 rounded-full shadow-lg">
                    @endif

                    <div class="space-y-2">
                        {{-- symbol --}}
                        <h2 class="text-3xl font-bold text-white">
                            {{ $selectedCryptoData['name'] }} ({{ strtoupper($selectedCryptoData['symbol']) }})
                        </h2>
                        {{-- rank --}}
                        <p class="text-sm text-gray-300">
                        Rank #{{ $selectedCryptoData['market_cap_rank'] }}
                        </p>
                        {{-- genesis --}}
                        <p class="text-sm text-gray-300">
                            Genesis: {{ $selectedCryptoData['genesis_date'] ?? 'N/A' }}
                        </p>
                        {{-- algorithm --}}
                        <p class="text-sm text-gray-300">
                            Algorithm: {{ $selectedCryptoData['hashing_algorithm'] ?? 'N/A' }}
                        </p>
                        {{-- asset platform id --}}
                        @if ($selectedCryptoData['asset_platform_id'])
                            <p class="text-sm text-gray-300">
                                Ecosystem: {{ strtoupper($selectedCryptoData['asset_platform_id']) }}
                            </p>                                
                        @endif
                    </div>
                </div>                  
              
                {{-- Market Data --}}
                @if($selectedCryptoData['market_data'])
                    {{-- If market data --}}
                    @php 
                        $marketData = $selectedCryptoData['market_data']; 
                    @endphp                    

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-5">
                        {{-- Left Column --}}
                        <div class="space-y-4">
                            {{-- current price --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    Current Price (USD)
                                </p>
                                <p class="{{ str_contains('$' . number_format($marketData['current_price']['usd'] ?? 0, 2), '-') ? 'text-red-400' : '' }}">
                                    ${{ number_format($marketData['current_price']['usd'] ?? 0, 2) }}
                                </p>
                            </div>
                            {{-- market cap --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    Market Cap
                                </p>
                                <p>
                                    ${{ number_format($marketData['market_cap']['usd'] ?? 0) }}
                                </p>
                            </div>
                            {{-- total suply --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    Total Supply
                                </p>
                                <p>
                                    {{ $marketData['total_supply'] ?? 'N/A' }}
                                </p>
                            </div>
                            {{-- max supply --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    Max Supply
                                </p>
                                <p>
                                    {{ $marketData['max_supply'] ?? 'N/A' }}
                                </p>
                            </div>
                            {{-- circulating supply --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    Circulating Supply
                                </p>
                                <p>
                                    {{ $marketData['circulating_supply'] ?? 'N/A' }}
                                </p>
                            </div>                            
                        </div>

                        {{-- Right Column --}}
                        <div class="space-y-4">                          
                            {{-- 24h change --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    24h Change
                                </p>
                                <p class="{{ str_contains(number_format($marketData['price_change_percentage_24h'] ?? 0, 2), '-') ? 'text-red-400' : (str_contains(number_format($marketData['price_change_percentage_24h'] ?? 0, 2), '+') ? 'text-green-400' : '') }}">
                                    {{ number_format($marketData['price_change_percentage_24h'] ?? 0, 2) }}%
                                </p>
                            </div>
                            {{-- 24h volume --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    24h Volume
                                </p>
                                <p>
                                    ${{ number_format($marketData['total_volume']['usd'] ?? 0) }}
                                </p>
                            </div>
                            {{-- ATH high --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    All-Time High
                                </p>
                                <p>
                                    ${{ number_format($marketData['ath']['usd'] ?? 0, 2) }}
                                </p>
                            </div>
                            {{-- ATH change --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    ATH Change
                                </p>
                                <p>
                                    {{ number_format($marketData['ath_change_percentage']['usd'] ?? 0, 2) }}% from ATH
                                </p>
                            </div>
                            {{-- ATH low --}}
                            <div class="flex justify-between border-b border-white/10 pb-2 text-sm text-white/90">
                                <p class="font-medium">
                                    All-Time Low
                                </p>
                                <p>
                                    ${{ number_format($marketData['atl']['usd'] ?? 0, 8) }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Description --}}
                    @if($selectedCryptoData['description']['en'] ?? null)
                        <div class="bg-white/5 rounded-lg p-4 mb-5">
                            <h4 class="text-xl font-semibold text-white mb-2">
                                About {{ $selectedCryptoData['name'] }}
                            </h4>
                            <div class="text-sm text-gray-200 prose max-w-none prose-invert">
                                {!! $selectedCryptoData['description']['en'] !!}
                            </div>
                        </div>
                    @endif
                @else
                    {{-- If no market data --}}
                    <div class="text-gray-300 text-center text-sm mb-5">
                        No market data available.
                    </div>
                @endif

                {{-- Categories --}}
                <div class="bg-white/5 rounded-lg p-4 mb-5">
                    <h3 class="text-lg font-semibold text-white mb-2">
                        Categories
                    </h3>
                    <ul class="list-disc list-inside text-sm text-purple-200 space-y-1">
                        @foreach ($selectedCryptoData['categories'] as $category)
                            <li>
                                {{ $category }}
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Links --}}
                <div class="flex flex-col sm:flex-row justify-between text-sm text-purple-200">
                    <a href="{{ $selectedCryptoData['links']['homepage'][0] ?? '#' }}" target="_blank" class="font-semibold text-blue-500 hover:text-blue-700 hover:underline mb-3 sm:mb-0">
                        Official Website
                    </a>
                    <a href="{{ $selectedCryptoData['links']['whitepaper'] ?? '#' }}" target="_blank" class="font-semibold text-blue-500 hover:text-blue-700 hover:underline">
                        White Paper
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
