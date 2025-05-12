<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'username',
        'email',
        'day_checkin',
        'day_checkout',
        'note',
        'total',
        'order_detail',
        'token',
        'status'
    ];

}
