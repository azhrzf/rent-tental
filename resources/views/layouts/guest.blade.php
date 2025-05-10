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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-neutral-600 dark:text-neutral-300 antialiased">
    <div
        class="space-y-5 min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-[#0A0A0A]">
        <a href="/" class="flex items-center justify-center space-x-1 hover:text-neutral-900 dark:hover:text-neutral-100">
            <x-application-logo class="w-8 h-8" />
            <h1 class="text-2xl font-bold">
                {{ config('app.name') }}
            </h1>
        </a>
        <section
            class="w-full sm:max-w-md p-6 group flex rounded-sm max-w-sm flex-col overflow-hidden border border-neutral-300 bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-900">
            {{ $slot }}
        </section>
    </div>
</body>

</html>
