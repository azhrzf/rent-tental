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

        return view('routes.dashboard.orders', array_merge($result, [
            'startDate' => $request->input('start_date'),
            'endDate' => $request->input('end_date'),
        ]));
    }

    public function adminIndex(Request $request)
    {
        $result = Order::getAdminOrdersWithDetails(
            $request->input('start_date'),
            $request->input('end_date')
        );

        return view('routes.dashboard.manage-orders', array_merge($result, [
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
            'pickup_date' => 'required|date|after_or_equal:order_date',
            'payment_confirmed_date' => 'nullable|date|after_or_equal:order_date',
            'expected_return_date' => 'required|date|after_or_equal:pickup_date',
            'actual_return_date' => 'nullable|date|after_or_equal:pickup_date',
            'description' => 'nullable|string|max:500',
            'payment_proof' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'pickup_date.after_or_equal' => 'Tanggal Sewa harus sama atau setelah tanggal pesanan.',
            'expected_return_date.after_or_equal' => 'Tanggal pengembalian harus sama atau setelah Tanggal Sewa.',
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

        if ($request->hasFile('payment_proof')) {
            if ($order->payment_proof && file_exists(public_path('images/payments/' . $order->payment_proof))) {
                unlink(public_path('images/payments/' . $order->payment_proof));
            }

            $image = $request->file('payment_proof');

            $directory = public_path('images/payments');
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($directory, $imageName);
            $validated['payment_proof'] = $imageName;
        }

        $order->update($validated);

        if ($request->status === 'paid') {
            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibayar dan akan segera diproses.');
        }

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil. Silakan tunggu konfirmasi dari Admin.');
    }

    public function show(Request $request, $id)
    {
        $keyword = $request->input('search', '');
        $orderData = Order::getOrderWithDetails($id, $keyword);

        return view('routes.dashboard.orders-detail', [
            'order' => $orderData['order'],
            'orderDetails' => $orderData['orderDetails'],
            'totalQuantity' => $orderData['totalQuantity'],
            'totalPrice' => $orderData['totalPrice'],
            'keyword' => $keyword,
        ]);
    }
}
