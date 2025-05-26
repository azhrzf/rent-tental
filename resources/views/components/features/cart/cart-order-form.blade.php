@props(['order', 'totalPrice'])

<x-shared.buttons.modal-button modalName="process-order-modal" class="w-full flex items-center justify-center gap-1.5">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-bag-check">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path
            d="M11.5 21h-2.926a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.5 3.248" />
        <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
        <path d="M15 19l2 2l4 -4" />
    </svg>
    Sewa seluruh alat
</x-shared.buttons.modal-button>
<x-utilities.modal name="process-order-modal" maxWidth="sm">
    <div
        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 px-4 pb-3 pt-2 dark:border-neutral-700 dark:bg-neutral-950/20">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white">
            Checkout Order #{{ $order->identity_number }}
        </h2>
    </div>
    <div class="px-4 pt-4 flex space-x-2 items-center">
        <span
            class="rounded-sm w-fit border border-neutral-300 bg-neutral-50 px-3 py-2 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">Total:
            Rp{{ format_number($totalPrice) }}</span>
    </div>
    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')
        <input type="hidden" name="status" value="need_confirmation">
        <div class="space-y-4 px-4 ">
            <div>
                <label for="order_date"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Tanggal Sewa
                </label>
                <input type="date" id="order_date" name="order_date"
                    value="{{ old('order_date', $order->order_date) }}"
                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                @error('order_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="expected_return_date"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Tanggal Pengembalian
                </label>
                <input type="date" id="expected_return_date" name="expected_return_date"
                    value="{{ old('expected_return_date', $order->expected_return_date) }}"
                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                @error('expected_return_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Keterangan Pemesanan
                </label>
                <textarea id="description" name="description" rows="3"
                    placeholder="Tambahkan detail atau permintaan khusus untuk pesanan Anda"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white">{{ old('description', $order->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div
            class="flex space-x-2 justify-end border-t border-neutral-300 bg-neutral-50/60 px-4 pb-2 pt-3 dark:border-neutral-700 dark:bg-neutral-950/20">
            <x-shared.buttons.secondary-button class="w-full lg:w-auto"
                x-on:click="$dispatch('close')">Batalkan</x-shared.buttons.secondary-button>
            <button type="submit"
                class="rounded-sm whitespace-nowrap bg-black border-2 border-black px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white">
                Konfirmasi Pesanan
            </button>
        </div>
    </form>
</x-utilities.modal>
