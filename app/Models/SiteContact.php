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

