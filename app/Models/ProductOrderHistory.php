<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrderHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'orders_product_history';
}
