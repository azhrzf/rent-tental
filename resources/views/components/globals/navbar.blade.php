@props([
    'showHeaderLogo' => false,
])

<header
    class="px-4 lg:px-0 sticky top-0 z-40 border-b border-neutral-300 bg-neutral-50 py-2 dark:border-neutral-700 dark:bg-neutral-900"
    aria-label="top navibation bar">
    <div class="flex items-center justify-between max-w-6xl mx-auto py-2">
        <nav class="inline-block text-sm font-medium">
            @if ($showHeaderLogo)
                <a href="/"
                    class="flex items-center justify-center space-x-1 hover:text-neutral-700 dark:hover:text-neutral-300">
                    <x-globals.application-logo class="lg:w-8 lg:h-8" />
                    <h1 class="text-md lg:text-2xl font-bold">
                        {{ config('app.name') }}
                    </h1>
                </a>
            @else
                <ol class="flex flex-wrap items-center gap-1">
                    <li class="flex items-center gap-1">
                        <a href="#" class="hover:text-neutral-700 dark:hover:text-white">Dashboard</a>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                            stroke-width="2" class="size-4" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </li>

                    <li class="flex items-center gap-1 font-bold text-neutral-700 dark:text-white" aria-current="page">
                        Marketing</li>
                </ol>
            @endif
        </nav>
        <div class="flex items-center space-x-2">
            <x-utilities.theme-toggle />
            <x-utilities.sidebar-toggle />
            @auth
                <nav x-data="{ open: false }"
                    class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex sm:items-center sm:ms-6">
                            <x-utilities.dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-utilities.dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-utilities.dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-utilities.dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-utilities.dropdown-link>
                                    </form>
                                </x-slot>
                            </x-utilities.dropdown>
                        </div>
                    </div>
                </nav>
            @else
                <div class="hidden lg:flex space-x-2">
                    <a href="{{ route('register') }}"
                        class="whitespace-nowrap rounded-sm bg-black border border-black px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white">
                        Register
                    </a>
                    <a href="{{ route('login') }}"
                        class="whitespace-nowrap rounded-sm bg-black border border-black px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>
</header>
