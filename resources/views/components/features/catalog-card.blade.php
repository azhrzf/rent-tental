@props(['name', 'image', 'price', 'availableQuantity', 'description'])

<article
    class="group flex rounded-sm max-w-sm flex-col justify-between overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <div class="h-40 overflow-hidden">
        <img src="/images/tools/{{ $image }}" loading="lazy""
            class="object-cover transition duration-700 ease-out group-hover:scale-105"
            alt="a penguin robot talking with a human" />
    </div>
    <div class="flex flex-col space-y-3 px-6 pt-6 pb-4">
        <h3 class="text-lg lg:text-xl font-bold text-neutral-900 dark:text-white" aria-describedby="productDescription">
            {{ $name }}</h3>
        <p id="featureDescription" class="text-pretty text-sm">
            {{ words_limit($description, 10) }}
        </p>
        <div class="flex space-x-2 items-center">
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Tersedia:
                {{ $availableQuantity }}
            </span>
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Sewa:
                Rp{{ $price }}
            </span>
        </div>
    </div>
    <button type="button"
        class="mx-6 mb-6 flex items-center justify-center gap-2 whitespace-nowrap bg-black px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white rounded-sm">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"
            class="size-3.5">
            <path fill-rule="evenodd"
                d="M5 4a3 3 0 0 1 6 0v1h.643a1.5 1.5 0 0 1 1.492 1.35l.7 7A1.5 1.5 0 0 1 12.342 15H3.657a1.5 1.5 0 0 1-1.492-1.65l.7-7A1.5 1.5 0 0 1 4.357 5H5V4Zm4.5 0v1h-3V4a1.5 1.5 0 0 1 3 0Zm-3 3.75a.75.75 0 0 0-1.5 0v1a3 3 0 1 0 6 0v-1a.75.75 0 0 0-1.5 0v1a1.5 1.5 0 1 1-3 0v-1Z"
                clip-rule="evenodd" />
        </svg>
        Tambah ke Keranjang
    </button>
</article>
