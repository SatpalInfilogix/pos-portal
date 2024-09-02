<?php

namespace App\Http\Controllers;

/* Library Imports Starts Here */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth; 
use App\Models\Category;
use App\Models\Product;
use App\Models\StoreProduct;
use App\Models\Store;
use App\Models\User;
use App\Models\PriceMaster;
use App\Models\Customer;
use App\Models\Order;
use App\Models\ReturnStockProduct;
/* Library Imports Stops Here */

/* Controller Imports Imports Starts Here */
use App\Http\Controllers\AdminUserController;
/* Controller Imports ends Here */


class AdminDashboardController extends Controller
{
    // public function showAdminDashboard(){
    //     // get user details for the login
    //     if (! Gate::allows('backend')) {
    //         return redirect()->route('pos-dashboard');
    //     }

    //     $store_id = Auth::user()->store_id;
    //     if($store_id){
    //         $totalProducts =  StoreProduct::where('store_id',$store_id)->get()->count();
    //         $totalSaleInvoices = Order::where('store_id',$store_id)->get()->count();
    //         $totalSaleAmount = Order::where('store_id',$store_id)->get()->sum('TotalAmount');
    //         $totalInventoryReturn = ReturnStockProduct::where('store_id',$store_id)->get()->count();
    //     }else{
    //         $totalProducts = Product::whereHas('category', function ($query) {
    //                                 $query->where('status', 0); // Ensure that the category status is 0
    //                             })->get()->count();
    //         $totalSaleInvoices = Order::get()->count();
    //         $totalSaleAmount = Order::get()->sum('TotalAmount');
    //         $totalInventoryReturn = ReturnStockProduct::get()->count();
    //     }

    //     $adminUserobject = new AdminUserController();
    //     $adminUser = $adminUserobject->getAdminUserDetail();
    //     $totalCustomers = Customer::get()->count();
        
        
    //     $products = $this->getLatestProducts();

    //         return view('admin.index')->with([
    //             'userDetails'      => $adminUser,
    //             'products'         => $products,
    //             'totalCustomers'   => $totalCustomers,
    //             'totalProducts'    => $totalProducts,
    //             'totalSaleInvoices'=> $totalSaleInvoices,
    //             'totalInventoryReturn' => $totalInventoryReturn,
    //             'totalSaleAmount' => $totalSaleAmount
    //         ]);

    // }

    public function showAdminDashboard(Request $request)
    {
        if (!Gate::allows('backend')) {
            return redirect()->route('pos-dashboard');
        }
        $user = Auth::user();
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $isSuperAdmin = $user->hasRole('Super Admin');
        $store_id = $request->input('store_id');

        if (!$isSuperAdmin) {
            $store_id = Auth::user()->store_id;
        }

        if ($store_id) {
            $totalProductsQuery = StoreProduct::where('store_id', $store_id);
            $totalSaleInvoicesQuery = Order::where('store_id', $store_id)->where('OrderStatus', 'completed');
            $totalSaleAmountQuery = Order::where('store_id', $store_id)->where('OrderStatus', 'completed');
            $totalInventoryReturnQuery = ReturnStockProduct::where('store_id', $store_id);
        } else {
            $totalProductsQuery = Product::whereHas('category', function ($query) {
                $query->where('status', 0);
            });
            $totalSaleInvoicesQuery = Order::where('OrderStatus', 'completed');
            $totalSaleAmountQuery = Order::where('OrderStatus', 'completed');
            $totalInventoryReturnQuery = ReturnStockProduct::query();
        }

        if ($startDate) {
            $startDate = \Carbon\Carbon::parse($startDate)->startOfDay();
            $totalProductsQuery->where('created_at', '>=', $startDate);
            $totalSaleInvoicesQuery->where('created_at', '>=', $startDate);
            $totalSaleAmountQuery->where('created_at', '>=', $startDate);
            $totalInventoryReturnQuery->where('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $endDate = \Carbon\Carbon::parse($endDate)->endOfDay();
            $totalProductsQuery->where('created_at', '<=', $endDate);
            $totalSaleInvoicesQuery->where('created_at', '<=', $endDate);
            $totalSaleAmountQuery->where('created_at', '<=', $endDate);
            $totalInventoryReturnQuery->where('created_at', '<=', $endDate);
        }

        $totalProducts = $totalProductsQuery->count();
        $totalSaleInvoices = $totalSaleInvoicesQuery->count();
        $totalSaleAmount = $totalSaleAmountQuery->sum('TotalAmount');
        $totalInventoryReturn = $totalInventoryReturnQuery->count();

        $stores = Store::where('is_deleted', 0)->latest()->get();
        $adminUserobject = new AdminUserController();
        $adminUser = $adminUserobject->getAdminUserDetail();
        $totalCustomers = Customer::count();

        $products = $this->getLatestProducts();

        if ($request->ajax()) {
            return response()->json([
                'totalProducts' => $totalProducts,
                'totalSaleInvoices' => $totalSaleInvoices,
                'totalSaleAmount' => $totalSaleAmount,
                'totalInventoryReturn' => $totalInventoryReturn,
                'stores' => $stores,
                'totalCustomers' => $totalCustomers,
                'products' => $products,
            ]);
        }

        return view('admin.index')->with([
            'userDetails' => $adminUser,
            'products' => $products,
            'totalCustomers' => $totalCustomers,
            'totalProducts' => $totalProducts,
            'totalSaleInvoices' => $totalSaleInvoices,
            'totalInventoryReturn' => $totalInventoryReturn,
            'totalSaleAmount' => $totalSaleAmount,
            'stores' => $stores,
        ]);
    }

    private function getLatestProducts()
    {
        $products = Product::where('status', 0)
                            ->whereHas('category', function ($query) {
                                $query->where('status', 0); // Ensure that the category status is 0
                            })
                            ->with(['price' => function ($query) {
                                $query->orderBy('quantity', 'desc'); // Order prices by quantity in descending order
                            }])
                            ->get();

        foreach ($products as $proKey => $product) {
            $categoryName = $product->category ? $product->category->name : null;
            $price = $product->priceMaster ? $product->priceMaster->price : null;

            $products[$proKey]['categoryName'] = $categoryName;
            $products[$proKey]['price'] = $price;
        }
        return $products;
    }

    public function chartDetails(Request $request)
    {
        $user = Auth::user();
        $storeId = $request->input('store_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $isSuperAdmin = $user->hasRole('Super Admin');

        // Determine the store_id based on user role and request parameters
        if (!$isSuperAdmin) {
            // For non-super admins, use the store_id associated with the user
            $storeId = $user->store_id;
        }

        $query = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(TotalAmount) as total_amount')
                        ->where('OrderStatus', 'completed')
                        ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
                        ->orderBy('year')
                        ->orderBy('month');

        if ($storeId) {
            $query->where('store_id', $storeId);
        }
    
        if ($startDate && $endDate) {
            $startDate = \Carbon\Carbon::parse($startDate)->startOfDay();
            $endDate = \Carbon\Carbon::parse($endDate)->endOfDay();
            $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        } elseif ($startDate) {
            $startDate = \Carbon\Carbon::parse($startDate)->startOfDay();
            $query->whereDate('created_at', '>=', $startDate);
        } elseif ($endDate) {
            $endDate = \Carbon\Carbon::parse($endDate)->endOfDay();
            $query->whereDate('created_at', '<=', $endDate);
        }
                    
        $monthlySums = $query->get();
        // $store_id = Auth::user()->store_id;
        // if($store_id){
        //     $monthlySums = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(TotalAmount) as total_amount')
        //     ->where('store_id', $store_id)->where('OrderStatus', 'completed')
        //     ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
        //     ->orderBy(DB::raw('YEAR(created_at)'))
        //     ->orderBy(DB::raw('MONTH(created_at)'))
        //     ->get();
        // }else{
        //     $monthlySums = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(TotalAmount) as total_amount')
        //     ->where('OrderStatus', 'completed')
        //     ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
        //     ->orderBy('year')
        //     ->orderBy('month')
        //     ->get();
        // }

        $months = [];
        $sales = [];

        $allMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        foreach ($allMonths as $monthName) {
            $months[] = $monthName;
            $sales[] = 0; 
        }

        foreach ($monthlySums as $data) {
            $monthIndex = $data->month - 1;
            $sales[$monthIndex] = number_format($data->total_amount, 2);
        }
        return response()->json([
            'months' => $months,
            'sales' => $sales
        ]);
    }

    // public function chartDetails(){

    //     $store_id = Auth::user()->store_id;
    //     if($store_id){
    //         $monthlySums = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(TotalAmount) as total_amount')
    //         ->where('store_id', $store_id)
    //         ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
    //         ->orderBy(DB::raw('YEAR(created_at)'))
    //         ->orderBy(DB::raw('MONTH(created_at)'))
    //         ->get();
    //     }else{
    //         $monthlySums = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(TotalAmount) as total_amount')
    //         ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
    //         ->orderBy('year')
    //         ->orderBy('month')
    //         ->get();
    //     }


    //     $months = [];
    //     $sales = [];

    //     $allMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    //     foreach ($allMonths as $monthName) {
    //         $months[] = $monthName;
    //         $sales[] = 0; 
    //     }

    //     foreach ($monthlySums as $data) {
    //         $monthIndex = $data->month - 1;
    //         $sales[$monthIndex] = number_format($data->total_amount, 2);
    //     }
    //     return response()->json([
    //         'months' => $months,
    //         'sales' => $sales
    //     ]);
    // }
}
