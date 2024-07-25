<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\PriceMaster;
use App\Models\Order;
use App\Models\Discount;
use App\Models\Customer;

class PosDashboardController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 0)
                    ->withCount(['products' => function ($query) {
                    $query->where('status', 0); // Condition for products status
                    }])->latest()->get();

        $totalProducs = $categories->sum('products_count');
    
        $products = Product::where('status', 0)->latest()->get();
        foreach ($products as $proKey => $product) {
            $category = Category::where('id', $product->category_id)->first();
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

        // $discounts = Discount::where('quantity', '<', $cart_quantity)->get();
        $roleId = auth()->user()->roles()->first()->id;
        $discount = Discount::where('roles', $roleId)->first();

        $customers = Customer::all();
        
        return view('pos.index', compact('categories', 'totalProducs', 'products','invoiceId', 'discount', 'customers'));
    }
}
