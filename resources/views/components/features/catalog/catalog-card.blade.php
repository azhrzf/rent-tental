@props(['tool'])

<article
    class="group flex rounded-sm flex-col justify-between overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <div class="h-40 overflow-hidden">
        <img src="/images/tools/{{ $tool->image }}" loading="lazy"
            class="object-cover w-full h-full object-center transition duration-700 ease-out group-hover:scale-105"
            alt="pic" />
    </div>
    <div class="flex flex-col space-y-3 px-6 pt-6 pb-4">
        <a href="{{ route('catalogs.show', $tool->id) }}" class="hover:underline">
            <h3 class="text-lg lg:text-xl font-bold text-neutral-900 dark:text-white "
                aria-describedby="productDescription">
                {{ $tool->name }}</h3>
        </a>
        <p id="featureDescription" class="text-pretty text-sm">
            {{ words_limit($tool->description, 10) }}
        </p>
        <div class="flex space-x-2 items-center">
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Tersedia:
                {{ $tool->availableQuantity }}
            </span>
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Tambah
                ke keranjang:
                Rp{{ format_number($tool->price) }}
            </span>
        </div>
    </div>
    <div class="mx-6 mb-6 grid grid-cols-12 gap-3">
        <div class="col-span-8">
            <x-features.catalog.catalog-card-quantity-form :tool="$tool" />
        </div>
        <a href="{{ route('catalogs.show', $tool->id) }}"
            class="col-span-4 flex items-center justify-center text-xs font-semibold bg-black text-white hover:bg-neutral-800 dark:bg-white dark:text-black dark:hover:bg-neutral-200">
            Detail
        </a>
    </div>
</article>
