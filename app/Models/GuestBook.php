<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'organization',
        'purpose',
        'message',
        'visit_date',
    ];

    protected $dates = [
        'visit_date',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];
}
