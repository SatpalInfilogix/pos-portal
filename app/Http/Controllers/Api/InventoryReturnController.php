<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StoreProduct;
use Illuminate\Support\Facades\Auth;

class InventoryReturnController extends Controller
{

    public function availableProductQuantity(Request $request)
    {
        $availableProductQuantity = [];
        foreach($request->product_ids as $key =>  $product_id){
            $product = StoreProduct::where('product_id', $product_id)
                ->where('store_id', Auth::user()->store_id)
                ->first();
            $availableProductQuantity[$key]['product_id'] = $product_id;
            $availableProductQuantity[$key]['product_quantity'] = 0;
            if($product) {
                $availableProductQuantity[$key]['product_quantity'] = $product->quantity;
            }
        }

        return response()->json([
            'status'          => 200,
            'message'         => 'Available Quantity.',
            'productQuantity' => $availableProductQuantity
        ]);
    }
}
