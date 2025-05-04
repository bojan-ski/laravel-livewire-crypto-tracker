<section class="dashboard-search mb-5">
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
    @else
        {{-- search form --}}
        <form wire:submit.prevent="applySearch">
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                {{-- input text - search term --}}
                <input wire:model="searchTerm" type="text" placeholder="Search for cryptocurrencies..."
                    class="w-full sm:w-auto flex-grow bg-slate-800 text-white placeholder-slate-400 border border-slate-700 rounded-lg py-2 px-4 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition duration-150">

                @if($searchTerm)
                    {{-- reset/clear search --}}
                    <button wire:click="clearSearch" type="button"
                        class="bg-slate-700 text-white hover:bg-slate-600 rounded-lg px-6 py-2 font-semibold shadow-md transition duration-150 cursor-pointer">
                        Clear
                    </button>
                @else
                    {{-- submit search --}}
                    <button type="submit"
                        class="bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-600 hover:to-teal-600 text-white rounded-lg px-6 py-2 font-semibold shadow-md transition duration-150 cursor-pointer">
                        Search
                    </button>
                @endif
            </div>
        </form>
    @endif
</section>