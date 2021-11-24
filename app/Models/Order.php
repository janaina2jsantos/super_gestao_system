<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table    = 'orders';
    protected $fillable = [
        'client_id'
    ];


    // N:N => one Product belongs to many Orders
    public function products() 
    {
        return $this->belongsToMany(\App\Models\Product::class, 'order_products')->withPivot('id','created_at', 'updated_at');
    }

    // N:1 => Order belongs to Client
    public function client() 
    {
        return $this->belongsTo(\App\Models\Client::class, 'client_id', 'id');
    }
}
