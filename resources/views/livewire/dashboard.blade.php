<div class="dashboard-page text-gray-100 mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- error message --}}
        @if ($error)
            <livewire:error-message :$error />            
        @endif

        {{-- search option --}}
        <livewire:dashboard-search-option />

        @if (count($searchedCryptoData) > 0)
            {{-- search results --}}
            <livewire:dashboard-search-results-table :$searchedCryptoData />        
        @else      
            {{-- crypto data - table --}}
            <div
                class="overflow-x-auto bg-gray-900/90 shadow-2xl shadow-purple-700/20 ring-1 ring-gray-700 rounded-2xl mb-5">

                <table class="min-w-full divide-y divide-gray-700 text-sm">
                    <thead class="bg-gradient-to-r from-purple-800 via-purple-600 to-pink-500">
                        {{-- table head row --}}
                        <livewire:dashboard-table-head :$cryptoData />
                    </thead>

                    <tbody class="bg-gray-900 divide-y divide-gray-800 text-sm">
                        {{-- no crypto (table) data message --}}
                        @if (count($cryptoData) === 0)
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-xl font-semibold text-gray-500">
                                    No cryptocurrencies found.
                                </td>
                            </tr>
                        @else
                            @foreach ($cryptoData as $crypto)
                                {{-- table body row --}}
                                <livewire:dashboard-table-body-tr :$crypto :key="$crypto['id']" />
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            @if (count($cryptoData) !== 0)
                <div class="flex items-center justify-between mb-10">
                    {{-- per page select option --}}
                    <livewire:dashboard-select-per-page-option />

                    {{-- pagination --}}
                    <livewire:dashboard-pagination :$page :$cryptoData />
                </div>
            @endif

        @endif
    </div>
</div>