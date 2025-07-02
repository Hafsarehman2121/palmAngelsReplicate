<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'productName',
        'productImage',
        'productDescription',
        'productCode',
        'productPrice',
        'quantity',
          
    ];
}
