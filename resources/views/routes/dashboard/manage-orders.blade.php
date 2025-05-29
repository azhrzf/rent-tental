@if (session('success'))
    <x-utilities.toast variant="success" title="Berhasil" :message="session('success')" />
@endif
@if ($errors->any())
    <x-utilities.toast variant="danger" title="Kesalahan" :message="$errors->all() ? implode(', ', $errors->all()) : ''" />
@endif
<x-dashboard-layout>
    <div class="space-y-6">
        @if ($orders && $orders->count())
            <div class="bg-white dark:bg-neutral-900 border border-neutral-300 dark:border-neutral-700 p-6">
                <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">Filter Tanggal</h3>
                <form method="GET" action="{{ route('orders.index') }}" class="flex flex-wrap gap-4 items-end">
                    <div class="flex-1 min-w-[200px]">
                        <label for="start_date"
                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                            Dari Tanggal
                        </label>
                        <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}"
                            class="w-full border border-neutral-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:focus:border-blue-400 dark:focus:ring-blue-800" />
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <label for="end_date"
                            class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">
                            Sampai Tanggal
                        </label>
                        <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}"
                            class="w-full border border-neutral-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:focus:border-blue-400 dark:focus:ring-blue-800" />
                    </div>
                    <div class="flex-shrink-0">
                        <x-shared.buttons.primary-button class="px-6 py-2">Cari</x-shared.buttons.primary-button>
                    </div>
                </form>
            </div>
        @endif
        @if ($orders && $orders->count())
            <div
                class="overflow-hidden w-full overflow-x-auto rounded-sm border border-neutral-300 dark:border-neutral-700">
                <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                    <thead
                        class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                        <tr>
                            <th scope="col" class="p-4">Order ID</th>
                            <th scope="col" class="p-4">Customer</th>
                            <th scope="col" class="p-4">Tanggal Order</th>
                            <th scope="col" class="p-4">Tanggal Pengambilan</th>
                            <th scope="col" class="p-4">Tanggal Pengembalian</th>
                            <th scope="col" class="p-4">Status</th>
                            <th scope="col" class="p-4">Total Alat</th>
                            <th scope="col" class="p-4">Jumlah Pembayaran</th>
                            <th scope="col" class="p-4">Detail</th>
                            <th scope="col" class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                        @foreach ($orders as $order)
                            <tr class="bg-white dark:bg-neutral-900 hover:bg-neutral-50 dark:hover:bg-neutral-800">
                                <td class="p-4">{{ $order->identity_number }}</td>
                                <td class="p-4">
                                    @if (isset($usersInfo) && isset($usersInfo[$order->id]))
                                        <div>
                                            <p class="font-medium">{{ $usersInfo[$order->id]['user_name'] }}</p>
                                            <p class="text-xs text-neutral-500">ID:
                                                {{ $usersInfo[$order->id]['user_id'] }}</p>
                                            <p class="text-xs text-neutral-500">
                                                {{ $usersInfo[$order->id]['user_email'] }}</p>
                                        </div>
                                    @else
                                        <div>
                                            <p class="font-medium">{{ $order->user->name }}</p>
                                            <p class="text-xs text-neutral-500">ID: {{ $order->user->id }}</p>
                                            <p class="text-xs text-neutral-500">{{ $order->user->email }}</p>
                                        </div>
                                    @endif
                                </td>
                                <td class="p-4">{{ $order->order_date }}</td>
                                <td class="p-4">{{ $order->pickup_date }}</td>
                                <td class="p-4">
                                    @if (!$order->actual_return_date)
                                        <p>{{ $order->expected_return_date }}</p>
                                        @if ($order->status === 'paid')
                                            <p class="text-xs">(Belum Dikembalikan)</p>
                                        @else
                                            <p class="text-xs">(Rencana)</p>
                                        @endif
                                    @else
                                        <p>{{ $order->actual_return_date }}</p>
                                    @endif
                                </td>
                                <td class="p-4">{{ order_status_mapper($order->status) }}</td>
                                <td class="p-4">{{ $order->getTotalQuantity() }}</td>
                                <td class="p-4">Rp{{ format_number($order->getTotalPrice()) }}</td>
                                <td class="p-4">
                                    <a href="{{ route('orders.show', $order->id) }}">
                                        <x-shared.buttons.secondary-button>
                                            Detail Alat
                                        </x-shared.buttons.secondary-button>
                                    </a>
                                </td>
                                <td><x-features.manage-order.manage-order-form :order="$order" /></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="col-span-full">
                <x-utilities.empty-result emptyText="Pemesanan" />
            </div>
        @endif
</x-dashboard-layout>
