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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
