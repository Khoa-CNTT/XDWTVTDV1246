<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'username',
        'product_id',
        'review',
    ];

    use HasFactory;

    // Quan hệ với bảng products
    public function product()
    {
        return $this->belongsTo(products::class);
    }
  
}


