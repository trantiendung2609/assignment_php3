<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shipping_id',
        'payment_id',
        'order_total',
        'order_status',
        'created_at',
        'updated_at',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
