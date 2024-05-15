<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-center font-sans antialiased">
    <div class="min-h-svh w-full max-w-md">
        <!-- Navigation -->
        @if (request()->routeIs('home') ||
                request()->routeIs('recipes.index') ||
                request()->routeIs('ingredients.index') ||
                request()->routeIs('shops.index'))
            @include('layouts.navigation')
        @endif

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white">
                <div class="mx-auto py-3 px-4">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
