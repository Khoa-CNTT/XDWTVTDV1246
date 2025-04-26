<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_name', 'user_account','date','amount', 'bank_code', 'bank_tran_no', 'card_type',
        'order_info', 'pay_date', 'transaction_no', 'txn_ref',
        'secure_hash','status'
    ];
    
}
