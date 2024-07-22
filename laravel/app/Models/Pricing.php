<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'services',
        'order',
        'status',
        'price',
        'priceprefix',
        'priceper'
    ];
}
