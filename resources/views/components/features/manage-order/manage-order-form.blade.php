@props(['order'])

<div class="px-4">
    <x-shared.buttons.modal-button modalName="admin-update-order-modal-{{ $order->id }}"
        class="w-full flex items-center justify-center gap-1.5">
        Update Detail
    </x-shared.buttons.modal-button>
</div>
<x-utilities.modal name="admin-update-order-modal-{{ $order->id }}" maxWidth="md">
    <div
        class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 px-4 pb-3 pt-2 dark:border-neutral-700 dark:bg-neutral-950/20">
        <h2 class="text-xl font-semibold text-neutral-900 dark:text-white">
            Update Order #{{ $order->identity_number }}
        </h2>
    </div>
    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PATCH')
        <input type="hidden" name="order_date" value="{{ $order->order_date }}">
        <input type="hidden" name="pickup_date" value="{{ $order->pickup_date }}">
        <input type="hidden" name="expected_return_date" value="{{ $order->expected_return_date }}">
        <div class="space-y-4 px-4 pt-4">
            <div>
                <label for="status" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Status Pesanan
                </label>
                <select id="status" name="status"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white"
                    required>
                    <option value="need_confirmation" {{ $order->status === 'need_confirmation' ? 'selected' : '' }}>
                        Perlu Konfirmasi
                    </option>
                    <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>
                        Sudah Dibayar
                    </option>
                    <option value="returned" {{ $order->status === 'returned' ? 'selected' : '' }}>
                        Sudah Dikembalikan
                    </option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="payment_confirmed_date"
                    class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Tanggal Konfirmasi Pembayaran
                </label>
                <input type="date" id="payment_confirmed_date" name="payment_confirmed_date"
                    min="{{ date('Y-m-d', strtotime($order->order_date)) }}"
                    value="{{ old('payment_confirmed_date', $order->payment_confirmed_date) }}"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white">
                @error('payment_confirmed_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="actual_return_date"
                    class="text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1 flex flex-col">
                    <span>Tanggal Pengembalian Aktual</span>
                    <span class="text-xs text-neutral-500">(Kosongkan jika belum dikembalikan)</span>
                </label>
                <input type="date" id="actual_return_date" name="actual_return_date"
                    min="{{ date('Y-m-d', strtotime($order->pickup_date)) }}"
                    value="{{ old('actual_return_date', $order->actual_return_date) }}"
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white">
                @error('actual_return_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="admin_notes" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">
                    Catatan Admin
                </label>
                <textarea id="admin_notes" name="admin_notes" rows="3" placeholder="Tambahkan catatan untuk pelanggan..."
                    class="block w-full rounded-sm border-neutral-300 py-2 text-neutral-900 shadow-sm focus:border-black focus:ring-black dark:border-neutral-700 dark:bg-neutral-900 dark:text-white dark:focus:border-white dark:focus:ring-white">{{ old('admin_notes', $order->admin_notes ?? '') }}</textarea>
                @error('admin_notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div
            class="flex space-x-2 justify-end border-t border-neutral-300 bg-neutral-50/60 px-4 pb-2 pt-3 dark:border-neutral-700 dark:bg-neutral-950/20">
            <x-shared.buttons.secondary-button class="w-full lg:w-auto" x-on:click="$dispatch('close')">
                Batalkan
            </x-shared.buttons.secondary-button>
            <button type="submit"
                class="rounded-sm whitespace-nowrap bg-black border-2 border-black px-4 py-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:bg-white dark:border-white dark:text-black dark:focus-visible:outline-white">
                Update Pesanan
            </button>
        </div>
    </form>
</x-utilities.modal>
