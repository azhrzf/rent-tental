@props(['order'])

<div x-data="{
    activeAccordion: '',
    setActiveAccordion(id) {
        this.activeAccordion = (this.activeAccordion == id) ? '' : id
    }
}"
    class="overflow-hidden rounded-sm border bg-white dark:bg-neutral-900 border-t border-neutral-200 dark:border-neutral-800">
    <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
        <button @click="setActiveAccordion(id)"
            class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
            <p>{{ $order->order_date }} | {{ $order->identity_number }}</p>
            <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': activeAccordion == id }"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        </button>
        <div x-show="activeAccordion==id" x-collapse x-cloak>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                @foreach ($order->orderDetails as $orderDetail)
                   <x-features.order-history.order-history-card :orderDetail="$orderDetail" />
                @endforeach
            </div>
        </div>
    </div>
</div>
