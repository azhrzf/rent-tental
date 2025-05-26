<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'identity_number',
        'order_date',
        'expected_return_date',
        'status',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getOrderDetailsWithTotals()
    {
        return $this->orderDetails()->with('tool')->get()->map(function ($orderDetail) {
            return [
                'order_detail' => $orderDetail,
                'tool' => $orderDetail->tool,
                'quantity' => $orderDetail->quantity,
                'total_price' => $orderDetail->tool->price * $orderDetail->quantity,
            ];
        });
    }

    public function getTotalQuantity()
    {
        return $this->orderDetails()->sum('quantity');
    }

    public function getTotalPrice()
    {
        return $this->orderDetails()->with('tool')->get()->sum(function ($orderDetail) {
            return $orderDetail->tool->price * $orderDetail->quantity;
        });
    }

    public static function getUserOrdersWithDetails($userId, $startDate = null, $endDate = null, $perPage = 12)
    {
        $orders = self::where('user_id', $userId)
            ->where('status', '!=', 'unpaid')
            ->when($startDate, fn($query) => $query->whereDate('order_date', '>=', $startDate))
            ->when($endDate, fn($query) => $query->whereDate('order_date', '<=', $endDate))
            ->latest()
            ->paginate($perPage);

        $orderIds = $orders->pluck('id');
        $allOrderDetails = OrderDetail::with('tool')
            ->whereIn('order_id', $orderIds)
            ->get()
            ->map(function ($orderDetail) {
                return [
                    'order_detail' => $orderDetail,
                    'tool' => $orderDetail->tool,
                    'quantity' => $orderDetail->quantity,
                    'total_price' => $orderDetail->tool->price * $orderDetail->quantity,
                ];
            });

        return [
            'orders' => $orders,
            'allOrderDetails' => $allOrderDetails,
            'sumToolQuantity' => $allOrderDetails->sum('quantity'),
            'sumTotalPrice' => $allOrderDetails->sum('total_price'),
        ];
    }

    public static function getCurrentCartData($userId, $keyword = '', $perPage = 12)
    {
        $order = self::where('user_id', $userId)
            ->where('status', 'unpaid')
            ->latest()
            ->first();

        $aggregatedTools = collect();
        $totalPrice = 0;
        $paginatedOrderDetails = null;

        if ($order) {
            $query = OrderDetail::with('tool')
                ->where('order_id', $order->id);

            if ($keyword) {
                $query->whereHas('tool', function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                });
            }

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
                        'order_id' => $firstItem->order_id,
                        'available_quantity' => $firstItem->tool->availableQuantity,
                        'potentialy_unavailable' => $firstItem->tool->isQuantityInOtherCarts($items->sum('quantity')),
                    ];
                })
                ->values();

            $totalPrice = $aggregatedTools->sum('total_price');
            $paginatedOrderDetails->setCollection($aggregatedTools);
        }

        return [
            'orderDetails' => $paginatedOrderDetails,
            'order' => $order,
            'totalPrice' => $totalPrice,
        ];
    }
}
