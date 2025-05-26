@props(['orderDetail'])

<article
    class="group flex rounded-sm flex-col justify-between overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
    <div class="h-40 overflow-hidden">
        <img src="/images/tools/{{ $orderDetail->tool->image }}" loading="lazy"
            class="object-cover transition duration-700 ease-out group-hover:scale-105"
           alt="pic"/>
    </div>
    <div class="flex flex-col space-y-3 px-6 pt-6 pb-4">
        <h3 class="text-lg lg:text-xl font-bold text-neutral-900 dark:text-white" aria-describedby="productDescription">
            {{ $orderDetail->tool->name }}</h3>
        <p id="featureDescription" class="text-pretty text-sm">
            {{ words_limit($orderDetail->tool->description, 10) }}
        </p>
        <div class="flex space-x-2 items-center">
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Jumlah:
                {{ $orderDetail->quantity }}
            </span>
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Satuan:
                Rp{{ format_number($orderDetail->tool->price) }}
            </span>
            <span
                class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-2 py-1 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Total:
                Rp{{ format_number($orderDetail->tool->price * $orderDetail->quantity) }}
            </span>
        </div>
    </div>
</article>
