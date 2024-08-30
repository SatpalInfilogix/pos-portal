<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PriceMaster;
use App\Models\Discount;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function priceMaster()
    {
        return $this->belongsTo(PriceMaster::class, 'product_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function price()
    {
        return $this->hasOne(PriceMaster::class, 'product_id');
    }
}
