@props(['id', 'quantity', 'availableQuantity'])

<x-shared.buttons.modal-button modalName="edit-quantity-modal-{{ $id }}" class="w-full flex items-center justify-center gap-1.5">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
        <path d="M16 5l3 3" />
    </svg>
    Ubah Jumlah
</x-shared.buttons.modal-button>
<x-utilities.modal name="edit-quantity-modal-{{ $id }}" maxWidth="sm">
    <form action="{{ route('cart.items.update', $id) }}" method="POST"
        class="flex flex-col gap-4 overflow-hidden rounded-sm bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
        @csrf
        @method('PATCH')
        <div
            class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 px-4 pb-3 pt-2 dark:border-neutral-700 dark:bg-neutral-950/20">
            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                Ubah Jumlah</h3>
        </div>
        <div class="px-4 py-8">
            <x-shared.inputs.quantity-input inputName="quantity" :quantity="$quantity" :availableQuantity="$availableQuantity" />
        </div>
        <div
            class="flex space-x-2 justify-end border-t border-neutral-300 bg-neutral-50/60 px-4 pb-2 pt-3 dark:border-neutral-700 dark:bg-neutral-950/20">
            <x-shared.buttons.secondary-button class="w-full lg:w-auto"
                x-on:click="$dispatch('close')">Batalkan</x-shared.buttons.secondary-button>
            <x-shared.buttons.primary-button class="w-full lg:w-auto">Ubah Jumlah</x-shared.buttons.primary-button>
        </div>
    </form>
</x-utilities.modal>
