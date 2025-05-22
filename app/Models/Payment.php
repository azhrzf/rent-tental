<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'payment_date',
        'amount',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getAllPayments()
    {
        return self::all();
    }

    public function getPaymentById($paymentId)
    {
        return self::find($paymentId);
    }
}
