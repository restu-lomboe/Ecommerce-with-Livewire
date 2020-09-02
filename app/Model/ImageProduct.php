<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $fillable = [
        'image',
        'product_id'
    ];

    public function product()
    {
        return $this->hasMany(\App\Model\Product::class);
    }
}
