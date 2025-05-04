<tr class="hover:bg-gray-800 transition-all duration-100 ease-in-out">
    {{-- rank --}}
    <td class="px-3 py-4 text-gray-400">
        {{ $crypto['market_cap_rank'] }}
    </td>

    {{-- img, name, symbol --}}
    <td class="px-3 py-4">
        <div class="flex items-center gap-3">
            <img class="h-8 w-8 rounded-full" src="{{ $crypto['image'] }}"
                alt="{{ $crypto['name'] }}">
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
        <span
            class="{{ $crypto['price_change_percentage_1h_in_currency'] >= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
            {{ number_format($crypto['price_change_percentage_1h_in_currency'], 2) }}%
        </span>
    </td>

    {{-- 24H --}}
    <td class="px-3 py-4 hidden sm:table-cell font-semibold">
        <span
            class="{{ $crypto['price_change_percentage_24h'] >= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
            {{ number_format($crypto['price_change_percentage_24h'], 2) }}%
        </span>
    </td>

    {{-- 7D --}}
    <td class="px-3 py-4 hidden md:table-cell font-semibold">
        @if(isset($crypto['price_change_percentage_7d_in_currency']))
        <span
            class="{{ $crypto['price_change_percentage_7d_in_currency'] >= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
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