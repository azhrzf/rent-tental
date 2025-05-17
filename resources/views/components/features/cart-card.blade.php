@props(['name', 'description', 'image', 'quantity', 'totalPrice'])

<article
    class="group rounded-sm overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <div class="h-44 overflow-hidden lg:col-span-4">
        <img src="/images/tools/{{ $image }}"
            class="object-cover object-center h-full w-full transition duration-700 ease-out group-hover:scale-105"
            alt={{ $name }} />
    </div>
    <div class="flex flex-col gap-4 p-6 col-span-8">
        <h3 class="text-lg lg:text-xl font-bold text-neutral-900 dark:text-white" aria-describedby="productDescription">
            {{ $name }}</h3>
        <div class="flex space-x-2 items-center">
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Jumlah:
                {{ $quantity }}</span>
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Total:
                ${{ $totalPrice }}</span>
        </div>
        <p id="productDescription" class="mb-2 text-pretty text-sm">
            {{ $description }}
        </p>
        <div class="grid grid-cols-12 gap-3">
            <div x-data="{ modalIsOpen: false }" class="col-span-8">
                <button x-on:click="modalIsOpen = true" type="button"
                    class="w-full rounded-sm bg-black border border-black px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white">Ubah
                    Detail</button>
                <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms
                    x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false"
                    x-on:click.self="modalIsOpen = false"
                    class="fixed inset-0 z-30 flex items-center justify-center bg-black/20 p-4 pb-8 backdrop-blur-md lg:p-8"
                    role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                    <div x-show="modalIsOpen"
                        x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                        x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                        class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-sm border border-neutral-300 bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                        <div
                            class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20">
                            <h3 id="defaultModalTitle"
                                class="font-semibold tracking-wide text-neutral-900 dark:text-white">Ubah Detail</h3>
                            <button x-on:click="modalIsOpen = false" aria-label="close modal">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                                    stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="px-4 py-8">
                            <div class="flex space-x-2 items-center">
                                <span
                                    class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                                    Jumlah:
                                    <input type="number" min="1" value="{{ $quantity }}"
                                        class="w-14 ml-1 rounded-sm border border-neutral-300 bg-white px-1 py-0.5 text-xs font-medium text-neutral-700 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-200 focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-white" />
                                </span>
                                <span
                                    class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                                    Total: ${{ $totalPrice }}
                                </span>
                            </div>
                        </div>
                        <div
                            class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                            <button x-on:click="modalIsOpen = false" type="button"
                                class="whitespace-nowrap rounded-sm px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">Batal</button>
                            <button x-on:click="modalIsOpen = false" type="button"
                                class="whitespace-nowrap rounded-sm bg-black border border-black dark:border-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button"
                class="col-span-4 rounded-sm bg-red-500 border border-red-500 px-4 py-2 text-xs font-medium tracking-wide text-white transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-red-500 dark:border-red-500 dark:text-white dark:focus-visible:outline-red-500">Hapus</button>
        </div>
    </div>
</article>
