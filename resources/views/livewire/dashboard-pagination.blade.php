<div class="flex items-center justify-center gap-6 mt-4">
    <button wire:click="prevPage()" type="button"
        class="px-5 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white font-semibold rounded-lg shadow-md hover:from-pink-600 hover:to-purple-600 transition duration-300 curser-pointer">
        Prev
    </button>

    <p class="text-lg font-bold text-slate-100">
        {{ $page }}
    </p>

    <button wire:click="nextPage()" type="button"
        class="px-5 py-2 bg-gradient-to-r from-cyan-500 to-teal-500 text-white font-semibold rounded-lg shadow-md hover:from-cyan-600 hover:to-teal-600 transition duration-300 curser-pointer">
        Next
    </button>
</div>