<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col min-h-screen">
        <header class="shadow-md p-6 flex justify-center items-center">
            <section class="w-full max-w-7xl flex justify-between items-center">
                <h1 class="text-3xl font-bold">Welcome</h1>
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </section>
        </header>
        <main class="bg-gray-100 flex flex-1">
            <div class="py-12 w-full">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <livewire:ColeccionDeAutos />
                    </div>
                </div>
            </div>
        </main>
        <footer class="">

        </footer>
    </body>
</html>
