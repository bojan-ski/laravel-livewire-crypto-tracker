<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- tailwind import --}}
    @vite('resources/css/app.css')

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- title --}}
    <title>
        {{ $title ?? 'Crypto Tracker' }}
    </title>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    {{-- HEADER --}}
    <livewire:header />

    {{-- flash message --}}
    @if (session('status'))
        <div class="pop-up-message fixed inset-0 z-100 bg-black/25 bg-opacity-15 pt-[150px]">
            <div class="max-w-max mx-auto p-6 md:px-8 rounded-lg bg-violet-500">
                <p class="text-2xl text-white font-semibold">
                    {{ session('status') }}
                </p>
            </div>
        </div>
    @endif

    {{-- MAIN - app content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <livewire:footer />
</body>

</html>