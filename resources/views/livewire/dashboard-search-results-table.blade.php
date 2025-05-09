<section class="max-w-2xl mx-auto bg-slate-800 rounded-xl shadow-lg overflow-hidden">
    <table class="min-w-full text-sm text-left text-white">
        <thead class="bg-gradient-to-r from-cyan-500 to-teal-500 text-white uppercase text-xs tracking-wider">
            <tr>
                <th class="px-6 py-3">
                    #
                </th>
                <th class="px-6 py-3">
                    Logo
                </th>
                <th class="px-6 py-3">
                    Name
                </th>
                <th class="px-6 py-3">
                    Symbol
                </th>
            </tr>
        </thead>
        <tbody class="bg-slate-900 divide-y divide-slate-700">
            @foreach ($searchedCryptoData as $crypto)
                <tr class="hover:bg-gray-800 transition-all duration-100 ease-in-out cursor-pointer" onclick="window.location.href='{{ route('show', ['cryptoId' => $crypto['id']]) }}'">
                    <td class="px-6 py-4">
                        {{ $crypto['market_cap_rank'] }}
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ $crypto['thumb'] }}" alt="{{ $crypto['name'] }}" class="h-8 w-8 rounded-full">
                    </td>
                    <td class="px-6 py-4">
                        {{ $crypto['name'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $crypto['symbol'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section> 