<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tool extends Model
{
    protected $fillable = [
        'product_number',
        'name',
        'price',
        'total_quantity',
        'status',
        'description',
        'image',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getAvailableQuantityAttribute()
    {
        $paidQuantity = $this->orderDetails()
            ->whereHas('order', function ($query) {
                $query->where('status', 'paid');
            })
            ->sum('quantity');

        $unpaidQuantity = 0;
        if (Auth::check()) {
            $userId = Auth::id();
            $unpaidQuantity = $this->orderDetails()
                ->whereHas('order', function ($query) use ($userId) {
                    $query->whereIn('status', ['unpaid', 'need_confirmation', 'paid'])
                        ->where('user_id', $userId);
                })
                ->sum('quantity');
        }

        return $this->total_quantity - $paidQuantity - $unpaidQuantity;
    }

    public function isQuantityInOtherCarts($quantity)
    {
        if (!Auth::check()) {
            return false;
        }

        $userId = Auth::id();

        $otherUsersQuantity = $this->orderDetails()
            ->whereHas('order', function ($query) use ($userId) {
                $query->whereIn('status', ['unpaid', 'need_confirmation'])
                    ->where('user_id', '!=', $userId);
            })
            ->sum('quantity');

        return $otherUsersQuantity >= $quantity;
    }
}
