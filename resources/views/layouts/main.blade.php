<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script>
        if (localStorage.getItem('darkMode') === 'true' ||
            (!('darkMode' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-black dark:text-white antialiased bg-gray-100 dark:bg-[#0A0A0A]">
    <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">
        <a class="sr-only" href="#main-content">skip to the main content</a>
        <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-neutral-950/10 backdrop-blur-xs md:hidden"
            aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>
        @yield('sidebar')
        <div class="w-full">
            @yield('navbar')
            <main>
                {{ $slot }}
            </main>
           <x-globals.footer /> 
        </div>
    </div>
</body>

</html>
