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
        $userId = Auth::id();
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $orders = Order::where('user_id', $userId)
            ->where('status', 'unpaid')
            ->when($startDate, function ($query) use ($startDate) {
                $query->whereDate('order_date', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                $query->whereDate('order_date', '<=', $endDate);
            })
            ->latest()
            ->paginate(10);

        return view('routes.dashboard.orders-history', [
            'orders' => $orders,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }

    public function current(Request $request)
    {
        $keyword = $request->input('search', '');
        $userId = Auth::id();

        $order = Order::where('user_id', $userId)
            ->where('status', 'unpaid')
            ->latest()
            ->first();

        $aggregatedTools = collect();
        $totalPrice = 0;

        if ($order) {
            $query = OrderDetail::with('tool')
                ->where('order_id', $order->id);

            if ($keyword) {
                $query->whereHas('tool', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                });
            }

            $perPage = 12;
            $paginatedOrderDetails = $query->paginate($perPage);

            $aggregatedTools = $paginatedOrderDetails->getCollection()
                ->groupBy('tool_id')
                ->map(function ($items) {
                    $firstItem = $items->first();
                    return [
                        'id' => $firstItem->id,
                        'tool' => $firstItem->tool,
                        'tool_id' => $firstItem->tool_id,
                        'total_quantity' => $items->sum('quantity'),
                        'unit_price' => $firstItem->tool->price,
                        'total_price' => $firstItem->tool->price * $items->sum('quantity'),
                        'order_id' => $firstItem->order_id
                    ];
                })
                ->values();

            $totalPrice = $aggregatedTools->sum('total_price');

            $paginatedOrderDetails->setCollection($aggregatedTools);
        } else {
            $paginatedOrderDetails = null;
        }

        return view('routes.dashboard.cart', [
            'orderDetails' => $paginatedOrderDetails,
            'order' => $order,
            'keyword' => $keyword,
            'totalPrice' => $totalPrice,
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
            'expected_return_date' => 'required_if:status,paid|nullable|date|after:today',
            'description' => 'nullable|string|max:500',
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
            return redirect()->route('orders-history')->with('success', 'Pesanan berhasil dibayar dan akan segera diproses.');
        }

        return redirect()->route('cart.current')->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
