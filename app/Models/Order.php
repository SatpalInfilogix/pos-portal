<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function productDetails(){
        return $this->hasMany(ProductOrderHistory::class,'order_id','OrderID');
    }
    public function customerDetail(){
        return $this->hasOne(Customer::class,'id','CustomerID');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
