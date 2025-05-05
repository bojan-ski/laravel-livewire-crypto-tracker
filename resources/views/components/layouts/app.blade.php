<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- tailwind import --}}
    @vite('resources/css/app.css')

    {{-- title --}}
    <title>
        {{ $title ?? 'Crypto Tracker' }}
    </title>
</head>

<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    {{-- HEADER --}}


    {{-- MAIN - app content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    <livewire:footer />
</body>

</html>