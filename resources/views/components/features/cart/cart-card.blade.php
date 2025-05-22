@props(['id', 'name', 'description', 'image', 'quantity', 'totalPrice'])

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
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-3 py-2 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Jumlah:
                {{ $quantity }}</span>
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-3 py-2 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Total:
                Rp{{ format_number($totalPrice) }}</span>
        </div>
        <p id="productDescription" class="mb-2 text-pretty text-sm">
            {{ words_limit($description, 10) }}
        </p>
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-8">
                <x-features.cart.cart-card-quantity-form :id="$id" :quantity="$quantity" :availableQuantity="10" />
            </div>
            <div class="col-span-4">
                <x-features.cart.cart-card-delete-form :id="$id" />
            </div>
        </div>
    </div>
</article>
