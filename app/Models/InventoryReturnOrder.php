<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryReturnOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'inventory_return_orders';

    public function customerDetail(){
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
