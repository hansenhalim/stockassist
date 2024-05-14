<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="flex flex-col items-center justify-center min-h-screen border-x w-full max-w-md">
        <div>
            <a href="/">
                <img class="w-40" src="{{ asset('assets/img/logo.png') }}" alt="">
            </a>
        </div>

        <div class="w-full mt-6 px-6 py-4 bg-white overflow-hidden">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
