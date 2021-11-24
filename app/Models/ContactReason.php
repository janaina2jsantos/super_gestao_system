<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactReason extends Model
{
    protected $table    = 'contact_reasons';
    protected $fillable = [
        'reason'
    ];
}
