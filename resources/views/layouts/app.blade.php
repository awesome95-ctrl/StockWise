<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <style>
            [x-cloak]{
                display: none !important;
            }
        </style>
    </head>

    {{-- sidebar open --}} 
    <body class="font-sans antialiased"
        x-data ="{ sidebarOpen: false}">
        <div class="flex min-h-screen">
            @include('layouts.sidebar')
            <div 
            x-cloak
            x-show = "sidebarOpen"
            @click = "sidebarOpen = false"
            x-transition.opacity
            class = "fixed inset-0 bg-black/50 z-40 lg:hidden" 
            ></div>
            <div class="flex-1 transition-all duration-300">
                @include('layouts.navigation')
                @isset($header)
                <header class="bg-white shadow">
                    <div class="px-4 sm:px-6 lg:px-8 py-4 sm:py-6 flex items-center gap-4">
                        <button
                        @click = "sidebarOpen = !sidebarOpen"
                        class="lg:hidden text-2xl font-bold text-gray-700 hover:text-blue-600"
                        ><i class="fa-solid fa-bars"></i></button>
                        {{ $header }}
                    </div>
                </header>
                @endisset

                <main class="p-4 sm:p-6 lg:p-8">
                    {{$slot}}
                </main>
            </div>

        </div>
    </body>
</html>
