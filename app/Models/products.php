<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
     use HasFactory;

    // Quan hệ với bảng reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    protected $fillable = ['Name','Address','Star_rating','Price_nomal','Price_sale','Phone','Gmail','Description','Content','avatar','images','Region'];

}
