<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'quantity',
        'unity_price',
        'total_price',
        'customer_name',
        'email',
        'address',
        'city',
        'country',
        'zip',
        'phone',
];
}
