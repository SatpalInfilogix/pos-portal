<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\PriceMaster;
use App\Models\UserActivity;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\StoreProduct;
use App\Models\Order;
use App\Models\Discount;
use App\Models\Customer;

class PosDashboardController extends Controller
{
    public function index(Request $request)
    {

        if (!$request->user()) {
            return response()->json(['message' => 'Unauthorized. Bearer token required'], 401);
        }

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
                        $query->where('status', 0);
                    }])->latest()->take(15)->get();
       
        $productsTotal = Category::where('status', 0)->with('products')->get();

        $totalProducts = $productsTotal->flatMap(function ($productCount) {
            return $productCount->products;
        })->count();

        $selectedCategoryId = $request->input('category_id');

        $productsQuery = Product::where('status', 0)
                            ->whereHas('category', function ($query) {
                                $query->where('status', 0);
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

        $roleId = auth()->user()->roles()->first()->id;
        $discount = Discount::where('role_id', $roleId)->first();

        $customers = Customer::get()->unique('contact_number');

        $completedOrders = Order::where('OrderStatus','completed')->orderBy('OrderID', 'DESC')->get();
        $holdOrders = Order::where('OrderStatus','onhold')->orderBy('OrderID', 'DESC')->get();
        $unPaidOrders = Order::where('OrderStatus','unpaid')->orderBy('OrderID', 'DESC')->get();

        return response()->json([
            'status' => 200,
            'messages' => 'Data fetched successfully.',
            'categories' => $categories,
            'totalProducts' => $totalProducts,
            'products' => $products,
            'invoiceId' => $invoiceId,
            'discount' => $discount,
            'customers' => $customers,
            'completedOrders' => $completedOrders,
            'holdOrders' => $holdOrders,
            'unPaidOrders' => $unPaidOrders,
            'userActivity' => $userActivity
        ]);
    }

    public function getTransaction(Request $request)
    {
        $maxItemsPerPage = 10;

        $recentTransaction = Order::select(['created_at', 'OrderID', 'CustomerName', 'TotalAmount'])->where('CreatedBy',Auth::user()->id);

        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $recentTransaction->where(function ($query) use ($searchValue) {
                $query->where('OrderID', 'like', '%' . $searchValue . '%')
                    ->orWhere('created_at', 'like', '%' . $searchValue . '%')
                    ->orWhere('CustomerName', 'like', '%' . $searchValue . '%')
                    ->orWhere('TotalAmount', 'like', '%' . $searchValue . '%');
            });
        }

        if ($request->has('order')) {
            $orderColumn = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumn]['data'];
            $recentTransaction->orderBy($column, $orderDirection);
        }

        $totalRecords = $recentTransaction->count();
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = $request->input('start', 0) / $perPage;
        $recentTransactions = $recentTransaction->skip($currentPage * $perPage)->take($perPage)->get();

        return response()->json([
            'status' => 200,
            'messages' => 'Transactions data fetched successfully.',
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $recentTransactions
        ]);
    }
}
