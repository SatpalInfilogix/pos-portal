<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    public $table_name = 'categories';
    protected $guarded = [];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
