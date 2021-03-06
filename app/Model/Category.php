<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'nama',
        'banner',
        'slug',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(\App\Model\Product::class);
    }
}
