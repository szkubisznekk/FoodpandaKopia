<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'status_id',
        'order_time',
        'payment_method_id',
        'postal_code',
        'city',
        'address',
        'phone_number',
    ];
}
