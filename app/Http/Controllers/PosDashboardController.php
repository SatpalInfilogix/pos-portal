<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\PriceMaster;
use App\Models\Order;
use App\Models\Discount;
use App\Models\Customer;
use App\Models\StoreProduct;
use Illuminate\Support\Facades\Auth;

class PosDashboardController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('status', 0)->withCount(['products' => function ($query) {
                        $query->where('status', 0); // Condition for products status
                    }])->latest()->take(15)->get();
       
        $productsTotal = Category::where('status', 0)->with('products')->get();
        // Calculate the total number of products
        $totalProducts = $productsTotal->flatMap(function ($productCount) {
            return $productCount->products;
        })->count();

        $selectedCategoryId = $request->input('category_id');

        $productsQuery  = Product::where('status', 0)->latest();
        if ($selectedCategoryId) {
            $productsQuery->where('category_id', $selectedCategoryId);
        }
    
        $products = $productsQuery->latest()->get();
        foreach ($products as $proKey => $product) {
            $category = Category::where('id', $product->category_id)->first();
            $price = PriceMaster::where('product_id', $product->id)->where('status', 0)->first();

            $storeId = Auth::user()->store_id;

            $storeInventory = StoreProduct::where('store_id', $storeId)
                ->where('product_id', $product->id)
                ->first();

            $quantity = 0;
            if($storeInventory) {
                $quantity = $storeInventory->quantity;
            }

            $products[$proKey]['categoryName'] = $category->name ?? '';
            $products[$proKey]['price'] = optional($price)->price;
            $products[$proKey]['quantity'] = $quantity;
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
        $discount = Discount::where('role_id', $roleId)->first();

        $customers = Customer::get()->unique('contact_number');

        $completedOrders = Order::where('OrderStatus','completed')->orderBy('OrderID', 'DESC')->get();
        $holdOrders = Order::where('OrderStatus','onhold')->orderBy('OrderID', 'DESC')->get();
        $unPaidOrders = Order::where('OrderStatus','unpaid')->orderBy('OrderID', 'DESC')->get();
        
        if ($request->ajax()) {
            // Return filtered products as HTML
            $productsHtml = view('partials.products', compact('products'))->render();
            return response()->json([
                'success'   => true,
                'productsHtml' => $productsHtml,
            ]);
        }

        return view('pos.index', compact('categories', 'totalProducts', 'products','invoiceId', 'discount', 'customers','completedOrders','holdOrders','unPaidOrders'));
    }

}