<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'price',
        'image',
        'description',
        'category_id',
        'brand_id',
        'size_id',
        'created_at',
        'updated_at',
    ];

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function size()
    {
        return $this->belongsTo(size::class);
    }

    public function scopeByGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }
}
