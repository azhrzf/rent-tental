<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $result = Order::getUserOrdersWithDetails(
            Auth::id(),
            $request->input('start_date'),
            $request->input('end_date')
        );

        return view('routes.dashboard.orders-history', array_merge($result, [
            'startDate' => $request->input('start_date'),
            'endDate' => $request->input('end_date'),
        ]));
    }

    public function current(Request $request)
    {
        $keyword = $request->input('search', '');
        $userId = Auth::id();

        $cartData = Order::getCurrentCartData($userId, $keyword);

        return view('routes.dashboard.cart', [
            'orderDetails' => $cartData['orderDetails'],
            'order' => $cartData['order'],
            'keyword' => $keyword,
            'totalPrice' => $cartData['totalPrice'],
        ]);
    }

    public function update(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            return redirect()->back()->with('danger', 'Anda tidak memiliki akses untuk mengubah pesanan ini.');
        }

        $validated = $request->validate([
            'status' => 'required|in:paid,unpaid,returned,need_confirmation',
            'order_date' => 'required|date',
            'expected_return_date' => 'required|date|after_or_equal:order_date',
            'description' => 'nullable|string|max:500',
        ], [
            'expected_return_date.after_or_equal' => 'Tanggal pengembalian harus sama atau setelah tanggal sewa.',
        ]);

        foreach ($order->orderDetails as $orderDetail) {
            $tool = $orderDetail->tool;
            if ($orderDetail->quantity > $tool->available_quantity) {
                return redirect()->back()->with('danger', "Jumlah alat '{$tool->name}' melebihi stok tersedia ({$tool->available_quantity}). Ubah jumlah alat di keranjang Anda.");
            }
        }

        if ($request->status === 'paid' && $order->status === 'unpaid') {
            $validated['order_date'] = now()->format('Y-m-d');
        }

        $order->update($validated);

        if ($request->status === 'paid') {
            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibayar dan akan segera diproses.');
        }

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil. Silakan tunggu konfirmasi dari Admin.');
    }
}
