<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table    = 'product_details';
    protected $fillable = [
        'product_id', 'unit_id', 'lenght', 'width', 'height'
    ];

    
    // N:1 => ProductDetail belongs to Product
    public function product() 
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }

    // N:1 => ProductDetail belongs to a Unit
    public function unit() 
    {
        return $this->belongsTo(\App\Models\Unit::class, 'unit_id', 'id');
    }

}

