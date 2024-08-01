<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnStock extends Model
{
    use HasFactory;
    protected $table = 'return_stocks';
    protected $guarded = [];
    
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function deliveredItems()
    {
        return $this->hasMany(ReturnStockProduct::class)->with('product');
    }
}
