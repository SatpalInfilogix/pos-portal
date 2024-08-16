<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function deliveredItems()
    {
        return $this->hasMany(InventoryProduct::class)->with('product')->with('priceMaster');
    }


}
