 @if (session('success'))
     <x-utilities.toast variant="success" title="Berhasil" :message="session('success')" />
 @endif
 <x-dashboard-layout>
     <div class="space-y-6">
         <div class="space-y-3">
             <div class="w-full lg:max-w-xs">
                 <x-shared.inputs.search-input route="cart.current" :keyword="$keyword" />
             </div>
             @if ($orderDetails && $orderDetails->count())
                 <div class="max-w-xs grid grid-cols-12 gap-2">
                     <div class="col-span-7">
                         <x-features.cart.cart-order-form :order="$order" :totalPrice="$totalPrice" />
                     </div>
                     <div
                         class="col-span-5 rounded-sm w-full border border-neutral-300 bg-neutral-50 px-2 py-2 text-xs font-medium text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300">
                         Total: Rp{{ format_number($totalPrice) }}
                     </div>
                 </div>
             @endif
         </div>
         <div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
             @if ($orderDetails && $orderDetails->count())
                 @foreach ($orderDetails as $orderDetail)
                     <x-features.cart.cart-card id="{{ $orderDetail['id'] }}" name="{{ $orderDetail['tool']['name'] }}"
                         image="{{ $orderDetail['tool']['image'] }}" quantity="{{ $orderDetail['total_quantity'] }}"
                         totalPrice="{{ $orderDetail['total_price'] }}"
                         description="{{ $orderDetail['tool']['description'] }}" />
                 @endforeach
             @else
                 <x-utilities.empty-result emptyText="alat" />
             @endif
         </div>
         @if ($orderDetails && $orderDetails->count())
             {{  $orderDetails->links() }}
         @endif
     </div>
 </x-dashboard-layout>
