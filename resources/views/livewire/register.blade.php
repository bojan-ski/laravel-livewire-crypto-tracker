<div class="register-page mt-40">
    <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-gradient-to-br from-gray-800 via-gray-900 to-black shadow-xl backdrop-blur-md border border-white/10 rounded-2xl mx-auto">

        <h2 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 mb-8">
            Create an Account
        </h2>

        <form wire:submit.prevent="register" class="space-y-5">

            {{-- email --}}
            <div>
                <label for="email" class="block font-medium text-gray-300">
                    Email
                </label>
                <input id="email" wire:model="email" type="email"
                    class="p-2 mt-2 w-full rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 shadow-sm transition" required>
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- password --}}
            <div>
                <label for="password" class="block font-medium text-gray-300">
                    Password
                </label>
                <input id="password" wire:model="password" type="password"
                    class="p-2 mt-2 w-full rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm transition" required>
                @error('password')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- confirm password --}}
            <div>
                <label for="password_confirmation" class="block font-medium text-gray-300">
                    Confirm Password
                </label>
                <input id="password_confirmation" wire:model="password_confirmation" type="password"
                    class="p-2 mt-2 w-full rounded-lg bg-gray-700 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 shadow-sm transition" required>
            </div>

            {{-- register btn --}}
            <div>
                <button type="submit"
                    class="w-full mt-4 py-2 px-4 rounded-lg text-white font-semibold bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-700 hover:brightness-110 transition duration-300 shadow-md cursor-pointer">
                    Register
                </button>
            </div>

            {{-- link to login page --}}
            <div class="text-center mt-4">
                <a href="{{ route('login') }}"
                    class="text-sm text-cyan-400 hover:text-cyan-300 hover:underline transition duration-200">
                    Already have an account? Login
                </a>
            </div>

        </form>
    </div>
</div>
