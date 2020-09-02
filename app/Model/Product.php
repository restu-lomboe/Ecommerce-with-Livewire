<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_desc',
        'desc',
        'video',
        'image',
        'price',
        'discount',
        'sku',
        'berat',
        'stok',
        'status',
        'preorder',
        'recommended',
        'category_id',
        'brand_id'
    ];

    public function brands()
    {
        return $this->hasMany(\App\Model\Brand::class);
    }
    public function category()
    {
        return $this->hasMany(\App\Model\Category::class);
    }
    public function image_products()
    {
        return $this->belongsTo(\App\Model\ImageProduct::class);
    }
}
