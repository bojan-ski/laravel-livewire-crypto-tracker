<tr class="hover:bg-gradient-to-r hover:from-blue-800 hover:to-violet-700/60 transition-all duration-200" :key="$item['id']">
    <td class="px-4 py-3">
        {{ $item->quantity }}
    </td>
    <td class="px-4 py-3">
        {{ $item->crypto_purchase_price ?? '—' }}
    </td>
    <td class="px-4 py-3">
        {{ $item->crypto_market_price_on_purchase ?? '—' }}
    </td>
    <td class="px-4 py-3 text-red-400 font-medium">
        {{ $item->total_spend ?? '—' }}
    </td>
    <td class="px-4 py-3">
        {{ $item->purchase_currency ?? '—' }}
    </td>
    <td class="px-4 py-3">
        {{ $item->crypto_sell_price ?? '—' }}
    </td>
    <td class="px-4 py-3">
        {{ $item->crypto_market_price_on_sell ?? '—' }}
    </td>
    <td class="px-4 py-3 text-green-400 font-semibold">
        {{ $item->total_received ?? '—' }}
    </td>
    <td class="px-4 py-3 font-semibold">
        {{ $item->created_at->format('H:i:s d.m.Y') }}
    </td>
</tr>