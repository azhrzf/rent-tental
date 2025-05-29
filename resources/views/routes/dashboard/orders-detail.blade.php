<x-dashboard-layout>
    <div class="space-y-6">
        <!-- Order Header Information -->
        <div class="p-6 border border-neutral-300 bg-neutral-50 rounded-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <h2 class="text-xl font-bold text-neutral-900 dark:text-white mb-4">
                        Order #{{ $order->identity_number }}
                    </h2>
                    <div class="space-y-4">
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium">Status:</span>
                            <span
                                class="px-2 py-1 rounded-sm text-xs {{ $order->status === 'paid'
                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                    : ($order->status === 'need_confirmation'
                                        ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
                                        : ($order->status === 'returned'
                                            ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200'
                                            : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200')) }}">
                                {{ order_status_mapper($order->status) }}
                            </span>
                        </p>
                        @if ($order->payment_proof)
                            <x-shared.buttons.secondary-button>
                                <a href="{{ asset('/images/payments/' . $order->payment_proof) }}" target="_blank"
                                    class="hover:underline">Lihat Bukti Pembayaran</a>
                            </x-shared.buttons.secondary-button>
                        @else
                            <span class="text-neutral-500">Tidak Ada</span>
                        @endif
                    </div>
                </div>
                @if (isset($isAdmin) && $isAdmin && isset($user))
                    <div class="space-y-2">
                        <h3 class="font-semibold text-neutral-900 dark:text-white">Informasi Pelanggan</h3>
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium">Nama:</span> {{ $user['name'] }}
                        </p>
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium">Email:</span> {{ $user['email'] }}
                        </p>
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium">ID Pelanggan:</span> {{ $user['id'] }}
                        </p>
                    </div>
                @endif
                <div class="space-y-2">
                    <h3 class="font-semibold text-neutral-900 dark:text-white">Tanggal Penting</h3>
                    @if ($order->order_date)
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium">Tanggal Pesanan:</span>
                            {{ $order->order_date }}
                        </p>
                    @endif
                    @if ($order->pickup_date)
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium">Tanggal Sewa:</span>
                            {{ $order->pickup_date }}
                        </p>
                    @endif
                    @if ($order->expected_return_date)
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium">Rencana Tanggal Pengembalian:</span>
                            {{ $order->expected_return_date }}
                        </p>
                    @endif
                    @if ($order->actual_return_date)
                        <p class="text-sm text-neutral-600 dark:text-neutral-300">
                            <span class="font-medium">Tanggal Pengembalian Aktual:</span>
                            {{ $order->actual_return_date }}
                        </p>
                    @endif
                </div>

                <div class="space-y-2">
                    <h3 class="font-semibold text-neutral-900 dark:text-white">Ringkasan</h3>
                    <p class="text-sm text-neutral-600 dark:text-neutral-300">
                        <span class="font-medium">Total Item:</span> {{ $totalQuantity }}
                    </p>
                    <p class="text-sm text-neutral-600 dark:text-neutral-300">
                        <span class="font-medium">Total Harga:</span> Rp{{ format_number($totalPrice) }}
                    </p>
                    <p class="text-sm text-neutral-600 dark:text-neutral-300">
                        <span class="font-medium">Dibuat:</span> {{ $order->created_at }}
                    </p>
                </div>
            </div>

            @if ($order->description)
                <div class="mt-4 pt-4 border-t border-neutral-300 dark:border-neutral-700">
                    <h3 class="font-semibold text-neutral-900 dark:text-white mb-2">Keterangan</h3>
                    <p class="text-sm text-neutral-600 dark:text-neutral-300">{{ $order->description }}</p>
                </div>
            @endif
        </div>
        <div class="w-full lg:max-w-xs">
            <x-shared.inputs.search-input route="orders.show" :keyword="$keyword" :routeParams="$order->id" />
        </div>
        <div>
            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white mb-4">Item yang Disewa</h3>
            <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @if ($orderDetails && $orderDetails->count())
                    @foreach ($orderDetails as $orderDetail)
                        <x-features.order.order-card :orderDetail="$orderDetail" />
                    @endforeach
                @else
                    <div class="col-span-full">
                        <x-utilities.empty-result emptyText="alat" />
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-dashboard-layout>
