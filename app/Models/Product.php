<?php

namespace App\Models;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug_url',
        'description',
        'price',
        'stock',
        'product_code',
        'category_id',
        'status',
        'weight',
        'length',
        'width',
        'height'
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')->withPivot('quantity');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug_url = Str::slug($product->name);
        });
    }
}
