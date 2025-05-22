<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderDetailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tool_id' => 'required|exists:tools,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            $userId = Auth::id();

            $order = Order::where('user_id', $userId)
                ->where('status', 'unpaid')
                ->latest()
                ->first();

            if (!$order) {
                $order = Order::create([
                    'user_id' => $userId,
                    'status' => 'unpaid',
                    'identity_number' => 'ORD-' . time()
                ]);
            }

            $orderDetail = OrderDetail::where('order_id', $order->id)
                ->where('tool_id', $request->tool_id)
                ->first();

            if ($orderDetail) {
                $orderDetail->quantity += $request->quantity;
                $orderDetail->save();
            } else {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'tool_id' => $request->tool_id,
                    'quantity' => $request->quantity,
                ]);
            }

            return redirect()->back()->with('success', 'Alat berhasil ditambahkan ke keranjang');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', 'Gagal menambahkan alat ke keranjang: ' . $e->getMessage());
        }
    }

    public function update(Request $request, OrderDetail $orderDetail)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();

        if ($orderDetail->order->user_id !== $userId) {
            return redirect()->back()->with('danger', 'Anda tidak memiliki akses untuk mengubah item ini.');
        }

        $orderDetail->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Alat berhasil diperbarui di keranjang');
    }

    public function destroy(OrderDetail $orderDetail)
    {
        $userId = Auth::id();

        if ($orderDetail->order->user_id !== $userId) {
            return redirect()->back()->with('danger', 'Anda tidak memiliki akses untuk menghapus item ini.');
        }

        $orderDetail->delete();

        return redirect()->back()->with('success', 'Alat berhasil dihapus dari keranjang');
    }
}
