<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnStockProduct extends Model
{
    use HasFactory;
    protected $table = "return_stock_products";
    protected $guarded = [];
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function priceMaster()
    {
        return $this->belongsTo(PriceMaster::class, 'product_id', 'id');
    }
}
