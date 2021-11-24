<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table    = 'units';
    protected $fillable = [
        'unit', 'description'
    ];


    // 1:N => Unit has many Products
    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }

    // 1:N => Unit has many ProductsDetails
    public function productsDetails()
    {
        return $this->hasMany(\App\Models\ProductDetail::class);
    }
}
