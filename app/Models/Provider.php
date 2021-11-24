<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;
    
    protected $table    = 'providers';
    protected $fillable = [
        'name', 'uf', 'email', 'site'
    ];


    // 1:N => Provider has many Products
    public function products() 
    {
        return $this->hasMany(\App\Models\Product::class, 'provider_id', 'id');
    }

}

