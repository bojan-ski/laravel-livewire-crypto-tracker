<div class="dashboard-page py-6 min-h-screen text-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- error --}}
        @if ($error)
            <div class="text-center bg-red-600/10 border border-red-500 text-red-400 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">
                    Error:
                </strong>
                <span class="block sm:inline">
                    {{ $error }}
                </span>
            </div>
        @endif

        {{-- crypto data - table --}}
        <div class="overflow-x-auto bg-gray-900/90 shadow-2xl shadow-purple-700/20 ring-1 ring-gray-700 rounded-2xl mb-8">

            <table class="min-w-full divide-y divide-gray-700 text-sm">
                <thead class="bg-gradient-to-r from-purple-800 via-purple-600 to-pink-500">
                    {{-- <tr>
                        @foreach(['#', 'Coin', 'Price', '1h %', '24h %', '7d %', 'Market Cap', 'Volume (24h)'] as $i => $head)
                            <th class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide
                                {{ $i >= 4 ? 'hidden ' . ['sm','md','lg','lg'][$i - 4] . ':table-cell' : '' }}">
                                {{ $head }}
                            </th>
                        @endforeach
                    </tr> --}}

                    {{-- table head row --}}
                    <livewire:dashboard-table-head :cryptoData="$cryptoData" />


                    {{-- <tr>
                        <th wire:click="selectedSortOption('market_cap_rank')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            #
                            @if ($sortField === 'market_cap_rank')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Coin
                        </th>
                        <th wire:click="selectedSortOption('current_price')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            Price
                            @if ($sortField === 'current_price')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th wire:click="selectedSortOption('price_change_percentage_1h_in_currency')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            1h %
                            @if ($sortField === 'price_change_percentage_1h_in_currency')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th wire:click="selectedSortOption('price_change_percentage_24h')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            24h %
                            @if ($sortField === 'price_change_percentage_24h')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th wire:click="selectedSortOption('price_change_percentage_7d_in_currency')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            7d %
                            @if ($sortField === 'price_change_percentage_7d_in_currency')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th wire:click="selectedSortOption('market_cap')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            Market Cap
                            @if ($sortField === 'market_cap')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                        <th wire:click="selectedSortOption('total_volume')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                            Volume (24h)
                            @if ($sortField === 'total_volume')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @endif
                        </th>
                    </tr> --}}
                </thead>

                <tbody class="bg-gray-900 divide-y divide-gray-800 text-sm">
                    @if (count($cryptoData) === 0)
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-xl font-semibold text-gray-500">
                                No cryptocurrencies found.
                            </td>
                        </tr>
                    @else
                        @foreach ($cryptoData as $crypto)
                            <tr class="hover:bg-gray-800 transition-all duration-100 ease-in-out">
                                {{-- rank --}}
                                <td class="px-3 py-4 text-gray-400">
                                    {{ $crypto['market_cap_rank'] }}
                                </td>

                                {{-- img, name, symbol --}}
                                <td class="px-3 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="h-8 w-8 rounded-full" src="{{ $crypto['image'] }}" alt="{{ $crypto['name'] }}">
                                        <div>
                                            <span class="text-white font-semibold hidden sm:table-cell">
                                                {{ $crypto['name'] }}
                                            </span>
                                            <span class="uppercase text-purple-400 text-xs">
                                                {{ $crypto['symbol'] }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                {{-- price --}}
                                <td class="px-3 py-4 text-purple-300 font-medium">
                                    ${{ number_format($crypto['current_price'], 2) }}
                                </td>

                                {{-- 1H --}}
                                <td class="px-3 py-4 font-semibold">
                                    <span class="{{ $crypto['price_change_percentage_1h_in_currency'] >= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
                                        {{ number_format($crypto['price_change_percentage_1h_in_currency'], 2) }}%
                                    </span>
                                </td>

                                {{-- 24H --}}
                                <td class="px-3 py-4 hidden sm:table-cell font-semibold">
                                    <span class="{{ $crypto['price_change_percentage_24h'] >= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
                                        {{ number_format($crypto['price_change_percentage_24h'], 2) }}%
                                    </span>
                                </td>

                                {{-- 7D --}}
                                <td class="px-3 py-4 hidden md:table-cell font-semibold">
                                    @if(isset($crypto['price_change_percentage_7d_in_currency']))
                                        <span class="{{ $crypto['price_change_percentage_7d_in_currency'] >= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
                                            {{ number_format($crypto['price_change_percentage_7d_in_currency'], 2) }}%
                                        </span>
                                    @else
                                        <span class="text-gray-500">N/A</span>
                                    @endif
                                </td>

                                {{-- Market Cap --}}
                                <td class="px-3 py-4 hidden lg:table-cell text-gray-300">
                                    ${{ number_format($crypto['market_cap'], 0) }}
                                </td>

                                {{-- Volume --}}
                                <td class="px-3 py-4 hidden lg:table-cell text-gray-300">
                                    ${{ number_format($crypto['total_volume'], 0) }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mb-10">
            {{-- per page select option --}}
            <livewire:dashboard-select-per-page-option />

            {{-- pagination --}}
            <livewire:dashboard-pagination :page="$page" :cryptoData="$cryptoData" />
        </div>

    </div>
</div>
