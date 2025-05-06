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
    <livewire:pop-up-message />

    {{-- MAIN - app content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <livewire:footer />
</body>

</html>