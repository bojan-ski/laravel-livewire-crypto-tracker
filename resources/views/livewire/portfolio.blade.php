<div class="portfolio-page my-10">
    <div class="max-w-7xl mx-auto">

        @if ($error)
            {{-- error message --}}
            <livewire:error-message :$error />
        @elseif($groupedItems->isEmpty())  
            {{-- no data message --}}
            <h2 class="text-center font-bold text-white text-5xl">
                No data available
            </h2>       
        @else
            @foreach ($groupedItems as $coinId => $items)
                {{-- Each portfolio item --}}
                <div class="mb-10">

                    {{-- Crypto name & Update portfolio links --}}
                    <div class="flex items-center justify-between mb-4 border-b border-white/10 pb-2">
                        {{-- Crypto name & details link --}}
                        <div>
                            <h4 class="text-2xl font-bold text-white mb-2">
                                {{ strtoupper($coinId) }}
                            </h4>
                            <button class="text-blue-500 hover:text-blue-700 cursor-pointer" type="button" onclick="window.location.href='{{ route('show', ['cryptoId' => $coinId]) }}'">
                                See details
                            </button>
                        </div>
                        
                        {{-- Update portfolio links --}}
                        <div>                          
                            {{-- add crypto option --}}
                            <livewire:update-portfolio icon='fa-plus' :selectedCryptoDataId="$coinId" path='addCrypto' />
                            {{-- deduct crypto option --}}
                            <livewire:update-portfolio icon='fa-minus' :selectedCryptoDataId="$coinId" path='deductCrypto' />
                        </div>
                    </div>

                    {{-- Crypto data - Table --}}
                    <div class="overflow-x-auto rounded-lg shadow-xl ring-1 ring-white/10 mb-5">
                        <table class="min-w-full bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-gray-200 border border-white/10">
                            
                            {{-- table head row --}}
                            <livewire:portfolio-table-head />
                            
                            {{-- table body row --}}
                            <tbody class="divide-y divide-white/10">
                                @foreach ($items as $item)
                                    <livewire:portfolio-table-body-tr :$item :key="$item['id']" />
                                @endforeach
                            </tbody>
                    
                        </table>
                    </div>

                    {{-- Profit --}}
                    <div class="text-end mt-3">
                        <p class="inline-block border {{ $profits[$coinId] > 0 ? 'bg-green-600/10 text-green-400 border-green-500/20' : 'bg-red-600/10 text-red-400 border-red-500/20' }} px-4 py-2 rounded-lg font-semibold shadow-sm">
                            Profit: {{ $profits[$coinId] }} USD
                        </p>
                    </div>
                    
                </div>
            @endforeach
        @endif

    </div>
</div>
