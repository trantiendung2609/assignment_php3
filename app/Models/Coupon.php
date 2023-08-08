<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'coupon_times',
        'coupon_condition',
        'coupon_number',
        // `updated_at`,
        // `created_at`,
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}