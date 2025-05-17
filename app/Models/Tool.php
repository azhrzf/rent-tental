<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'product_number',
        'name',
        'price',
        'total_quantity',
        'description',
        'image',
    ];

    public static function getAllTools()
    {
        return self::all();
    }

    public static function search($keyword, $perPage = 12)
    {
        return self::where('name', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->paginate($perPage);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
