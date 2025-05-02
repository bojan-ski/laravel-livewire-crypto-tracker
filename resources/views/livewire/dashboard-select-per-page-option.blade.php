<select wire:model="selectPerPage" wire:change="setPerPage($event.target.value)"
    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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