<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kurale&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <script src="https://kit.fontawesome.com/3ea26eb442.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
        <script src="https://kit.fontawesome.com/3ea26eb442.js" crossorigin="anonymous"></script>

        @include('popper::assets')
        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/main.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="h-screen w-screen overflow-hidden flex flex-col items-center oranje1">
            @include('layouts.navigation')

            <!-- Page Heading -->

            @if (isset($header))
            <div class="relative h-12 w-screen bg-white border-b border-oranje2 place-content-center items-center flex">
                {{ $header }}
            </div>
            @endif

            <!-- Page Content -->
            <div class="relative w-full h-full overflow-y-scroll overflow-x-hidden py-4 sm:rounded-lg">
                {{ $slot }}
            </div>

        </div>
    </body>
</html>
