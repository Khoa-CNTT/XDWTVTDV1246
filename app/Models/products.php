<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = ['Name','Address','Star_rating','Price_nomal','Price_sale','Phone','Gmail','Description','Content','avatar','images','Region'];
}
