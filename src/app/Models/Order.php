<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'vaccine_id', 'user_id', 'customer_name','customer_address', 'customer_phone', 'customer_email', 'quantity', 'total', 'state'
    ];
}
