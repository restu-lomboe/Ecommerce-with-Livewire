<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'nama',
        'banner',
        'logo',
        'slug',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(\App\Model\Product::class);
    }
}
