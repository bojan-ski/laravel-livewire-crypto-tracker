<div class="dashboard-page py-6 bg-slate-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- error --}}
        @if ($error)
            <div class="text-center bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">Error:</strong>
                <span class="block sm:inline">{{ $error }}</span>
            </div>
        @endif

        {{-- crypto data - table --}}
        <div class="overflow-x-auto bg-white shadow-md rounded-xl">

            <table class="min-w-full divide-y divide-slate-200">

                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-3 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">
                            #
                        </th>
                        <th class="px-3 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">
                            Coin
                        </th>
                        <th
                            class="px-3 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">
                            Price
                        </th>
                        <th
                            class="px-3 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide">
                            1h %
                        </th>
                        <th
                            class="px-3 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide hidden sm:table-cell">
                            24h %
                        </th>
                        <th
                            class="px-3 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide hidden md:table-cell">
                            7d %
                        </th>
                        <th
                            class="px-3 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">
                            Market Cap
                        </th>
                        <th
                            class="px-3 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wide hidden lg:table-cell">
                            Volume (24h)
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-slate-200 text-sm">
                    @if ($isLoading)
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-slate-500">
                                <div class="flex justify-center items-center gap-2">
                                    <svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.4 0 0 5.4 0 12h4zm2 5.3A8 8 0 014 12H0c0 3.04 1.13 5.82 3 7.94l3-2.64z">
                                        </path>
                                    </svg>
                                    Loading cryptocurrencies...
                                </div>
                            </td>
                        </tr>
                    @elseif (count($cryptoData) === 0)
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-slate-500">
                                No cryptocurrencies found.
                            </td>
                        </tr>
                    @else
                        @foreach ($cryptoData as $crypto)
                            <tr>
                                {{-- rank --}}
                                <td class="px-3 py-4 text-slate-500">
                                    {{ $crypto['market_cap_rank'] }}
                                </td>
                                {{-- img, name, symbol --}}
                                <td class="px-3 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="h-8 w-8 rounded-full" src="{{ $crypto['image'] }}"
                                            alt="{{ $crypto['name'] }}">
                                        <div>
                                            <span class="text-slate-800 font-medium hidden sm:table-cell">
                                                {{ $crypto['name'] }}
                                            </span>
                                            <span class="uppercase text-slate-500 text-xs">
                                                {{ $crypto['symbol'] }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                {{-- price --}}
                                <td class="px-3 py-4 text-slate-700">
                                    ${{ number_format($crypto['current_price'], 2) }}
                                </td>
                                {{-- 1H --}}
                                <td class="px-3 py-4">
                                    <span
                                        class="{{ $crypto['price_change_percentage_1h_in_currency'] >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                        {{ number_format($crypto['price_change_percentage_1h_in_currency'], 2) }}%
                                    </span>
                                </td>
                                {{-- 24H --}}
                                <td class="px-3 py-4 hidden sm:table-cell">
                                    <span
                                        class="{{ $crypto['price_change_percentage_24h'] >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                        {{ number_format($crypto['price_change_percentage_24h'], 2) }}%
                                    </span>
                                </td>
                                {{-- 1D --}}
                                <td class="px-3 py-4 hidden md:table-cell">
                                    @if(isset($crypto['price_change_percentage_7d_in_currency']))
                                        <span
                                            class="{{ $crypto['price_change_percentage_7d_in_currency'] >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                            {{ number_format($crypto['price_change_percentage_7d_in_currency'], 2) }}%
                                        </span>
                                    @else
                                        <span class="text-slate-400">N/A</span>
                                    @endif
                                </td>
                                {{-- market cap --}}
                                <td class="px-3 py-4 text-slate-700 hidden lg:table-cell">
                                    ${{ number_format($crypto['market_cap'], 0) }}
                                </td>
                                {{-- total volume --}}
                                <td class="px-3 py-4 text-slate-700 hidden lg:table-cell">
                                    ${{ number_format($crypto['total_volume'], 0) }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>