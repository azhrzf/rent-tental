<x-dashboard-layout>
    <div class="space-y-6">
        <div class="relative flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                aria-hidden="true"
                class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="search"
                class="w-full rounded-sm border border-neutral-300 bg-neutral-50 py-2 pl-10 pr-2 text-sm  disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50"
                name="search" placeholder="Search" aria-label="search" />
        </div>
        <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @for ($i = 0; $i < 6; $i++)
                <x-features.cart-card name="Product Name" image="image-not-found.jpg" quantity="1" totalPrice="100.00" description="Product description goes here." />
            @endfor
        </div>
        <div class="py-5 flex items-center justify-center mt-auto">
        </div>
    </div>
</x-dashboard-layout>
