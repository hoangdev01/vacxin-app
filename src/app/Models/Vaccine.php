<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    const STATUS_INACTIVE = 0;
    protected $fillable = [
        'name', 'origin', 'allocate','reser_price', 'late_price', 'active', 'image'
    ];
}
