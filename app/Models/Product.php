<?php

namespace App\Models;

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

}
