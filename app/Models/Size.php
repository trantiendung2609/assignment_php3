<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'product_id',
        'created_at',
        'updated_at',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
