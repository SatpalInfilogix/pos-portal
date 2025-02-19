<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\PriceMaster;

class CartController extends Controller
{
    public function generateInvoice()
    {
        $latestOrder = Order::orderBy('id', 'desc')->first();
        if (!$latestOrder) {
            return 'INV-000001';
        }

        $latestOrderId = $latestOrder->OrderID;
        $number = intval(substr($latestOrderId, 4)) + 1;
        return 'INV-' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity'   => 'required|integer|min:1',
        ]);

        $productDetail = Product::find($request->product_id);
        if (!$productDetail) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        $productPrice = PriceMaster::where('product_id', $request->product_id)->first();
        $price = $productPrice ? $productPrice->price : 0;

        $cart = [];

        // $productExists = false;
        // foreach ($cart['products'] ?? [] as $key => $product) {
        //     if ($product['id'] == $request->product_id) {
        //         if ($request->quantity == 0) {
        //             unset($cart['products'][$key]);
        //         } else {
        //             $cart['products'][$key]['quantity'] = $request->quantity;
        //             $cart['products'][$key]['product_total_amount'] = $cart['products'][$key]['quantity'] * $product['price'];
        //         }
        //         $productExists = true;
        //         break;
        //     }
        // }

        if ($request->quantity > 0) {
            $cart['products'][] = [
                "id" => $request->product_id,
                "code" => $productDetail->product_code,
                "quantity" => $request->quantity,
                "name" => $productDetail->name,
                "price" => $price,
                "product_total_amount" => $price * $request->quantity,
                "image" => $productDetail->image,
            ];
        }

        $cart_quantity = 0;
        $sub_total = 0;
        foreach ($cart['products'] as $product) {
            $cart_quantity += $product['quantity'];
            $sub_total += $product['quantity'] * $product['price'];
        }

        $cart['quantity'] = $cart_quantity;
        $cart['sub_total'] = $sub_total;
        $cart['formatted_sub_total'] = '$' . number_format($sub_total, 2);
        $cart['count'] = count($cart['products']);

        $cart['discount'] = isset($cart['discount']) ? $cart['discount'] : [];
        $cart['discount_amount'] = isset($cart['discount_amount']) ? $cart['discount_amount'] : 0;
        if (!empty($cart['discount'])) {
            $discountPercentage =  $cart['discount_percentage'];
            unset($cart['discount']);
            $discountAmount = ($discountPercentage / 100) * $cart['sub_total'];
            $sub_total -= $cart['discount_amount'];
            $cart['grand_total'] = $sub_total;
            $cart['formatted_grand_total'] = '$'. number_format( $cart['grand_total'] , 2);
            $cart['discount_amount'] = $discountAmount;
            $cart['discount_percentage'] = $discountPercentage;

            $cart['discount'] = [
                'id'                   => $discount->id ?? 0,
                'discount_percentage'  => $discountPercentage,
                'discount_amount'      => $discountAmount,
            ];
            $cart['tax'] = $cart['grand_total'] * 0.15;
            $cart['payable'] = number_format($cart['grand_total'] + $cart['tax'], 2);
        } else {
            $cart['grand_total'] = $sub_total;
            $cart['formatted_grand_total'] = '$' . number_format($sub_total, 2);
            $cart['discount'] = 0;
            $cart['discount_amount'] = 0;
            $cart['discount_percentage'] = 0;
            $cart['tax'] = $cart['grand_total'] * 0.15;
            $cart['payable'] = number_format($cart['grand_total'] + $cart['tax'], 2);
        }

        if (isset($cart['orderId'])) {
            $orderId = $cart['orderId'];
        } else {
            $orderId = $this->generateInvoice();
            $cart['orderId'] = $orderId;
        }

        // session()->put('cart', $cart);
        return response()->json([
            'success'=>true,
            'message'=>'Product Added to Cart', 
            'cart' => $cart,
            'orderId' => $cart['orderId'],
            'count'=> count($cart['products'])
        ]);
    }
    
}
