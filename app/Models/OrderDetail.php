<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'tool_id',
        'quantity',
        'description',
    ];

    /**
     * Create or get the latest unpaid order for the user, then add an order detail.
     *
     * @param int $toolId
     * @param int $userId
     * @param int $quantity
     * @param string|null $description
     * @return OrderDetail
     */
    public static function createWithTool($toolId, $userId, $quantity = 1, $description = null)
    {
        $order = Order::firstOrCreate(
            ['user_id' => $userId, 'status' => 'unpaid'],
        );

        return self::create([
            'order_id' => $order->id,
            'tool_id' => $toolId,
            'quantity' => $quantity,
            'description' => $description,
        ]);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
