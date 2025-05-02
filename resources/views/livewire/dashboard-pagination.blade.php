<div class="flex items-center justify-center">
    <button wire:click="prevPage()" type="button"
        class="text-white px-4 py-1.5 bg-blue-500 hover:bg-blue-700 rounded-lg cursor-pointer">
        Prev
    </button>

    <p class="mx-5 text-lg font-semibold">
        {{ $page }}
    </p>

    <button wire:click="nextPage()" type="button"
        class="text-white px-4 py-1.5 bg-blue-500 hover:bg-blue-700 rounded-lg cursor-pointer">
        Next
    </button>
</div>