@props(['id', 'name', 'image', 'price', 'availableQuantity', 'description'])

<article
    class="group flex rounded-sm max-w-sm flex-col justify-between overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <div class="h-40 overflow-hidden">
        <img src="/images/tools/{{ $image }}" loading="lazy"
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
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Tambah ke keranjang:
                Rp{{ $price }}
            </span>
        </div>
    </div>
    <div class="mx-6 mb-6">
        <x-features.catalog.catalog-card-quantity-form :id="$id" :availableQuantity="$availableQuantity" />
    </div>
</article>
