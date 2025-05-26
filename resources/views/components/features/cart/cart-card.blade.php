@props(['orderDetail'])
@php
    $catalogId = $orderDetail['tool']['id'];
@endphp

<article
    class="group rounded-sm overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <div class="h-44 overflow-hidden lg:col-span-4">
        <img src="/images/tools/{{ $orderDetail['tool']['image'] }}"
            class="w-full h-full object-center object-cover transition duration-700 ease-out group-hover:scale-105"
            alt={{ $orderDetail['tool']['name'] }} />
    </div>
    <div class="flex flex-col gap-4 p-6 col-span-8">
        <a href="{{ route('catalogs.show', $catalogId) }}" class="hover:underline">
            <h3 class="text-lg lg:text-xl font-bold text-neutral-900 dark:text-white"
                aria-describedby="productDescription">
                {{ $orderDetail['tool']['name'] }}</h3>
        </a>
        <div class="flex space-x-2 items-center">
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-3 py-2 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Jumlah:
                {{ $orderDetail['total_quantity'] }}</span>
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-3 py-2 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Total:
                Rp{{ format_number($orderDetail['total_price']) }}</span>
        </div>
        <p id="productDescription" class="mb-2 text-pretty text-sm">
            {{ words_limit($orderDetail['tool']['description'], 10) }}
        </p>
        @if ($orderDetail['potentialy_unavailable'])
            <p class="text-red-500">
                Barang ini mungkin tidak tersedia karena juga berada di keranjang pengguna lain. Segera selesaikan
                penyewaan supaya tidak kehabisan!
            </p>
        @endif
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-8">
                <x-features.cart.cart-card-quantity-form :id="$orderDetail['id']" :quantity="$orderDetail['total_quantity']" :availableQuantity="10" />
            </div>
            <div class="col-span-4">
                <x-features.cart.cart-card-delete-form :id="$orderDetail['id']" />
            </div>
        </div>
    </div>
</article>
