@props(['route', 'keyword' => ''])

<form action="{{ route($route) }}" method="GET"
    class="relative flex w-full flex-col gap-1 text-neutral-600 dark:text-neutral-300">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        aria-hidden="true"
        class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>
    <div class="flex items-center space-x-2">
        <input type="search" value="{{ $keyword }}"
            class="w-full rounded-sm border border-neutral-300 bg-neutral-50 py-2 pl-10 pr-2 text-sm  disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50"
            name="search" placeholder="Cari" aria-label="Cari" />
        <button type="submit"
            class="text-neutral-600/50 dark:text-neutral-300/50 whitespace-nowrap rounded-sm border border-neutral-300 bg-neutral-50 px-3 py-2 text-sm font-medium tracking-wide  transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-50 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-900/50  dark:focus-visible:outline-neutral-900">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
        </button>
    </div>
</form>
