<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\PriceMaster;
use App\Models\Order;
use App\Models\Discount;

class PosDashboardController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 0)->latest()->get();
        foreach ($categories as $key => $category) {
            $categories[$key]['count'] = Product::where('category_id', $category->id)->where('status', 0)->count();
        }


        $products = Product::where('status', 0)->latest()->get();
        foreach ($products as $proKey => $product) {
            $category = Category::where('id', $product->category_id)->first();
            // dd($categories);
            $price = PriceMaster::where('product_id', $product->id)->where('status', 0)->first();
            $products[$proKey]['categoryName'] = $category->name ?? '';
            $products[$proKey]['price'] = optional($price)->price;
        }

        $latestOrder = Order::orderBy('id', 'desc')->first();
        if (!$latestOrder) {
            $invoiceId =  'INV-000001';
        }else{
            $latestOrderId = $latestOrder->OrderID;
            $number = intval(substr($latestOrderId, 4)) + 1;
            $invoiceId = 'INV-' . str_pad($number, 6, '0', STR_PAD_LEFT);
        }
        $cart_quantity = 0;
        if (session('cart') && isset(session('cart')['products'])) {
            foreach(session('cart')['products'] as $key => $product) {
                $cart_quantity += $product['quantity'];
            }
        }

        $discounts = Discount::where('quantity', '<', $cart_quantity)->get();
        
        return view('pos.index', compact('categories', 'products','invoiceId', 'discounts'));
    }
}
