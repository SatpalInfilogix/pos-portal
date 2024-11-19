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
use App\Models\UserActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PosDashboardController extends Controller
{
    public function index(Request $request)
    {
        $todayDate = Carbon::now();
        $newPrices = PriceMaster::where('status', 0)->where('start_date', '<=', $todayDate)->get();

        foreach ($newPrices as $newPrice) {
            $newPrice->update([
                'price' => $newPrice->new_price,
                'new_price' => null,
                'start_date' => null
            ]);
        }

        $userActivity = UserActivity::where('user_id', Auth::user()->id)->latest()->first();
        $categories = Category::where('status', 0)->withCount(['products' => function ($query) {
                        $query->where('status', 0); // Condition for products status
                    }])->latest()->take(15)->get();
       
        $productsTotal = Category::where('status', 0)->with('products')->get();
        // Calculate the total number of products
        $totalProducts = $productsTotal->flatMap(function ($productCount) {
            return $productCount->products;
        })->count();

        // $totalProducts = $productsTotal->flatMap(function ($category) {
        //     return $category->products;
        // })->where('is_active', 0)->count();

        $selectedCategoryId = $request->input('category_id');

        $productsQuery = Product::where('status', 0)
                            ->whereHas('category', function ($query) {
                                $query->where('status', 0); // Ensure the category status is 0
                            })->latest();

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

        return view('pos.index', compact('categories', 'totalProducts', 'products','invoiceId', 'discount', 'customers','completedOrders','holdOrders','unPaidOrders', 'userActivity'));
    }

    public function getTransaction(Request $request)
{
    $maxItemsPerPage = 10;

    // Base query
    $recentTransaction = Order::select(['created_at', 'OrderID', 'CustomerName', 'TotalAmount'])->where('CreatedBy',Auth::user()->id);

    // Search filter
    if ($request->has('search') && !empty($request->search['value'])) {
        $searchValue = $request->search['value'];
        $recentTransaction->where(function ($query) use ($searchValue) {
            $query->where('OrderID', 'like', '%' . $searchValue . '%')
                  ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                  ->orWhere('CustomerName', 'like', '%' . $searchValue . '%')
                  ->orWhere('TotalAmount', 'like', '%' . $searchValue . '%');
        });
    }

    // Ordering
    if ($request->has('order')) {
        $orderColumn = $request->order[0]['column'];
        $orderDirection = $request->order[0]['dir'];
        $column = $request->columns[$orderColumn]['data'];
        $recentTransaction->orderBy($column, $orderDirection);
    }

    // Pagination
    $totalRecords = $recentTransaction->count(); // Total records before pagination
    $perPage = $request->input('length', $maxItemsPerPage);
    $currentPage = $request->input('start', 0) / $perPage;
    $recentTransactions = $recentTransaction->skip($currentPage * $perPage)->take($perPage)->get();

    // Respond with data
    return response()->json([
        "draw" => intval($request->input('draw')),
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => $totalRecords, // This should reflect the filtered count if filtering is applied
        "data" => $recentTransactions
    ]);
}


}