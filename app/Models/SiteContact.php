<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    protected $table    = 'site_contacts';
    protected $fillable = [
        'contact_reason_id', 'name', 'phone', 'email', 'message'
    ];
}

// Exemplo de busca com grupos de query
// $contatos = SiteContact::where(function($query) {

//     $query->where('name', 'Jorge Almeida')->orWhere('name', 'Ana'); // true or false = true

// })->where(function($query) {

//     $query->whereIn('contact_reason_id', [1, 2])->orWhereBetween('id', [4, 6]); // true or false = true

// })->get();