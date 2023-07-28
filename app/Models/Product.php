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
    ];

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function scopeByGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }
}