<?php

    function getProductQuantity($product_id)
    {
        $quantity = 0;
        $product = App\Models\PriceMaster::where('product_id', $product_id)->first();
        if($product) {
            $quantity = $product->quantity;
        }
       
       return $quantity;
    }