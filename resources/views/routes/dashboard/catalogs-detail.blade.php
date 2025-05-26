<x-dashboard-layout>
    <article
        class="w-full p-5 space-y-4 rounded-sm justify-between overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
        <div class="col-span-5 h-96 min-w-max overflow-hidden">
            <img src="/images/tools/{{ $tool->image }}" loading="lazy"
                class="w-full h-full object-cover object-center transition duration-700 ease-out group-hover:scale-105"
                alt="pic" />
        </div>
        <div class="col-span-7 flex flex-col space-y-3">
            <h3 class="text-lg lg:text-xl font-bold text-neutral-900 dark:text-white"
                aria-describedby="productDescription">
                {{ $tool->name }}</h3>
            <p id="featureDescription" class="text-pretty text-sm">
                {{ $tool->description }}
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
            <div class="mb-6">
                <x-features.catalog.catalog-card-quantity-form :tool="$tool" />
            </div>
        </div>
    </article>
</x-dashboard-layout>
