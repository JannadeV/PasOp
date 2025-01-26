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
        <script src="https://kit.fontawesome.com/3ea26eb442.js" crossorigin="anonymous"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('popper::assets')
    </head>
    <body class="font-sans text-black antialiased">
        <div class="h-screen overflow-hidden flex flex-col items-center pt-4 oranje1">
            <div class="h-20 sm:max-h-40 sm:h-1/5">
                <a class="h-full" href="/">
                    <img class="h-full" src="img/titel.png" alt="Naam van de app: Pas op een dier">
                </a>
            </div>

            <div class="w-full h-full overflow-y-scroll overflow-x-hidden px-6 py-4 sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
