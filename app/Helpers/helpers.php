<?php

use App\Models\StoreProduct;
use Illuminate\Support\Facades\Auth;

function getProductQuantity($product_id)
{
    $quantity = 0;
    $product = StoreProduct::where('product_id', $product_id)
        ->where('store_id', Auth::user()->store_id)
        ->first();

    if($product) {
        $quantity = $product->quantity;
    }

    return $quantity;
}