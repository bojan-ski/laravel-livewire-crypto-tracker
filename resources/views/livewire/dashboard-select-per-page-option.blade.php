<select wire:model="selectPerPage" wire:change="setPerPage($event.target.value)"
    class="bg-slate-800 text-white border-none rounded-md shadow-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500 transition duration-300">
    <option value="10">
        10 per page
    </option>
    <option value="25">
        25 per page
    </option>
    <option value="50">
        50 per page
    </option>
</select>