@props([
    'showHeaderLogo' => false,
])

<header
    class="px-4 lg:px-0 sticky top-0 z-50 border-b border-neutral-300 bg-neutral-50 py-2 dark:border-neutral-700 dark:bg-neutral-900"
    aria-label="top navibation bar">
    <div class="flex items-center justify-between max-w-6xl mx-auto py-2">
        <nav class="inline-block text-sm font-medium">
            @if ($showHeaderLogo)
                <div class="flex items-center space-x-10">
                    <a href="/" class="flex items-center space-x-1 text-link">
                        <x-globals.application-logo class="lg:w-8 lg:h-8" />
                        <h1 class="text-md lg:text-2xl font-bold">
                            {{ config('app.name') }}
                        </h1>
                    </a>
                    <div class="hidden lg:flex items-center space-x-5">
                        <a href="/catalogs" class="text-link hidden lg:flex items-center space-x-1 font-medium text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                            </svg>
                            <span>Katalog</span>
                        </a>
                        <a href="/about" class="text-link hidden lg:flex items-center space-x-1 font-medium text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-info-circle">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M12 9h.01" />
                                <path d="M11 12h1v4h1" />
                            </svg>
                            <span>Tentang</span>
                        </a>
                    </div>
                </div>
            @else
                <div>
                    <div class="hidden lg:block">
                        <p>Dashboard</p>
                    </div>
                    <div class="lg:hidden">
                        <a href="/" class="flex items-center space-x-1 text-link">
                            <x-globals.application-logo class="w-8 h-8" />
                            <span class="text-md font-bold">{{ config('app.name') }}</span>
                        </a>
                    </div>
            @endif
        </nav>
        <div class="flex items-center space-x-2">
            @auth
                <x-utilities.dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
                <x-utilities.theme-toggle />
                <x-utilities.sidebar-toggle />
            @else
                <x-utilities.theme-toggle />
                <x-utilities.sidebar-toggle />
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
