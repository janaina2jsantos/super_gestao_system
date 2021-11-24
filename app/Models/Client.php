<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table    = 'clients';
    protected $fillable = [
        'name'
    ];


    // 1:N => Client has many Orders
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'client_id', 'id');
    }
}
