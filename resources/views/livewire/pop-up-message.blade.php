<div>
    @if (session('status'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)"
            class="pop-up-message fixed inset-0 z-100 bg-black/25 bg-opacity-15 pt-[150px]">
            <div class="max-w-max mx-auto p-6 md:px-8 rounded-lg bg-violet-500">
                <p class="text-2xl text-white font-semibold">
                    {{ session('status') }}
                </p>
            </div>
        </div>
    @endif
</div>