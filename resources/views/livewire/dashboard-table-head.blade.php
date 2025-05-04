<tr>
    <th wire:click="selectedSortOption('market_cap_rank')"
        class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide cursor-pointer">
        #
        @if ($sortField === 'market_cap_rank')
            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
        @endif
    </th>
    <th class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide">
        Coin
    </th>
    <th wire:click="selectedSortOption('current_price')"
        class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide cursor-pointer">
        Price
        @if ($sortField === 'current_price')
            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
        @endif
    </th>
    <th wire:click="selectedSortOption('price_change_percentage_1h_in_currency')"
        class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide cursor-pointer">
        1h %
        @if ($sortField === 'price_change_percentage_1h_in_currency')
            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
        @endif
    </th>
    <th wire:click="selectedSortOption('price_change_percentage_24h')"
        class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide cursor-pointer hidden sm:table-cell">
        24h %
        @if ($sortField === 'price_change_percentage_24h')
            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
        @endif
    </th>
    <th wire:click="selectedSortOption('price_change_percentage_7d_in_currency')"
        class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide cursor-pointer hidden md:table-cell">
        7d %
        @if ($sortField === 'price_change_percentage_7d_in_currency')
            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
        @endif
    </th>
    <th wire:click="selectedSortOption('market_cap')"
        class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide cursor-pointer hidden lg:table-cell">
        Market Cap
        @if ($sortField === 'market_cap')
            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
        @endif
    </th>
    <th wire:click="selectedSortOption('total_volume')"
        class="px-3 py-3 text-left text-xs font-bold text-white uppercase tracking-wide cursor-pointer hidden lg:table-cell">
        Volume (24h)
        @if ($sortField === 'total_volume')
            <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
        @endif
    </th>
</tr>