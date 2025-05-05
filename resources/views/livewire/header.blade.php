<header class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 px-6 py-5 border-b border-white/10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
        {{-- Logo --}}
        <a href="{{ route('home') }}"
            class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 hover:brightness-110 transition duration-300">
            Crypto Tracker
        </a>

        {{-- Auth & portfolio options --}}
        <div class="flex items-center gap-4">
            @auth
                {{-- portfolio link --}}
                <a href="{{ route('register') }}" wire:navigate.hover
                    class="flex items-center gap-2 px-5 py-2 rounded-md text-sm md:text-base font-semibold text-white bg-gradient-to-r from-purple-800 via-purple-600 to-pink-500 hover:brightness-110 transition duration-300 shadow-md {{ request()->is('register') ? 'ring-2 ring-cyan-400' : '' }}">
                    <i class="fa-solid fa-star"></i>
                    <span class="hidden md:block">Portfolio</span>
                </a>

                {{-- logout user option --}}
                <livewire:logout />
            @else
                {{-- register link --}}
                <a href="{{ route('register') }}" wire:navigate.hover
                    class="flex items-center gap-2 px-5 py-2 rounded-md text-sm md:text-base font-semibold text-white bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-700 hover:brightness-110 transition duration-300 shadow-md {{ request()->is('register') ? 'ring-2 ring-cyan-400' : '' }}">
                    <i class="fa-solid fa-user-plus"></i>
                    <span class="hidden md:block">Register</span>
                </a>

                {{-- login link --}}
                <a href="{{ route('login') }}" wire:navigate.hover
                    class="flex items-center gap-2 px-5 py-2 rounded-md text-sm md:text-base font-semibold text-white bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-700 hover:brightness-110 transition duration-300 shadow-md {{ request()->is('login') ? 'ring-2 ring-cyan-400' : '' }}">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span class="hidden md:block">Login</span>
                </a>
            @endauth

        </div>
    </div>
</header>