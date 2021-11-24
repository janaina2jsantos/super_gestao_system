<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table    = 'products';
    protected $fillable = [
        'unit_id', 'provider_id', 'name', 'weight', 'description'
    ];


    // 1:1 => Product has one ProductDetail
    public function productDetail()
    {
        return $this->hasOne(\App\Models\ProductDetail::class, 'product_id', 'id');
    }

    // N:1 => Product belongs to Unit
    public function unit() 
    {
        return $this->belongsTo(\App\Models\Unit::class, 'unit_id', 'id');
    }

    // N:1 => Product belongs to Provider
    public function provider() 
    {
        return $this->belongsTo(\App\Models\Provider::class, 'provider_id', 'id');
    }

    // N:N => one Product belongs to many Orders
    public function orders() 
    {
        return $this->belongsToMany(\App\Models\Order::class, 'order_products')->withPivot('created_at');
    }
}


