@php $groupedItems = $portfolioItems->groupBy('coin_id'); @endphp

<div class="portfolio-page my-10 px-4 md:px-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if ($error)
            <div class="text-center bg-red-600/10 border border-red-500 text-red-400 px-4 py-3 rounded-lg shadow mb-6" role="alert">
                <strong class="font-bold">
                    Error:
                </strong>
                <span class="block sm:inline">
                    {{ $error }}
                </span>
            </div>
        @elseif($groupedItems->isEmpty())        
            <h2 class="text-center font-bold text-white text-5xl">
                No data available
            </h2>       
        @else
            @foreach ($groupedItems as $coinId => $items)
                {{-- Each portfolio item --}}
                <div class="mb-10">

                    {{-- crypto name & details link --}}
                    <div class="flex items-center justify-between mb-4 border-b border-white/10 pb-2">
                        <h4 class="text-2xl font-bold text-white">
                            {{ strtoupper($coinId) }}
                        </h4>

                        <button class="text-blue-500 hover:text-blue-700 cursor-pointer" type="button" onclick="window.location.href='{{ route('show', ['cryptoId' => $coinId]) }}'">
                            See details
                        </button>
                    </div>

                    {{-- crypto data - table --}}
                    <div class="overflow-x-auto rounded-lg shadow-xl ring-1 ring-white/10">
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
                    
                </div>
            @endforeach
        @endif

    </div>
</div>
