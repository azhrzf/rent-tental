@props(['id', 'availableQuantity'])

<x-shared.buttons.modal-button modalName="edit-quantity-modal" class="w-full flex items-center justify-center gap-1.5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" class="size-3.5">
        <path fill-rule="evenodd"
            d="M5 4a3 3 0 0 1 6 0v1h.643a1.5 1.5 0 0 1 1.492 1.35l.7 7A1.5 1.5 0 0 1 12.342 15H3.657a1.5 1.5 0 0 1-1.492-1.65l.7-7A1.5 1.5 0 0 1 4.357 5H5V4Zm4.5 0v1h-3V4a1.5 1.5 0 0 1 3 0Zm-3 3.75a.75.75 0 0 0-1.5 0v1a3 3 0 1 0 6 0v-1a.75.75 0 0 0-1.5 0v1a1.5 1.5 0 1 1-3 0v-1Z"
            clip-rule="evenodd" />
    </svg>
    Tambah ke keranjang
</x-shared.buttons.modal-button>
<x-utilities.modal name="edit-quantity-modal" maxWidth="sm">
    <form action="{{ route('cart.items.store') }}" method="POST"
        class="flex flex-col gap-4 overflow-hidden rounded-sm  bg-white text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
        @csrf
        <div
            class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 px-4 pb-3 pt-2 dark:border-neutral-700 dark:bg-neutral-950/20">
            <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900 dark:text-white">
                Ubah Jumlah</h3>
        </div>
        <div class="px-4 py-8">
            <input type="hidden" name="tool_id" value="{{ $id }}">
            <x-shared.inputs.quantity-input inputName="quantity" :quantity="$availableQuantity == 0 ? 0 : 1" :availableQuantity="$availableQuantity"
                :disabled="$availableQuantity == 0" />
            @if ($availableQuantity == 0)
                <p class="text-xs text-red-500 mt-2">Stok tidak tersedia.</p>
            @endif
        </div>
        <div
            class="flex space-x-2 justify-end border-t border-neutral-300 bg-neutral-50/60 px-4 pb-2 pt-3 dark:border-neutral-700 dark:bg-neutral-950/20">
            <x-shared.buttons.secondary-button class="w-full lg:w-auto"
                x-on:click="$dispatch('close')">Batalkan</x-shared.buttons.secondary-button>
            <x-shared.buttons.primary-button class="w-full lg:w-auto" :disabled="$availableQuantity == 0">
                Tambah ke keranjang
            </x-shared.buttons.primary-button>
        </div>
    </form>
</x-utilities.modal>
