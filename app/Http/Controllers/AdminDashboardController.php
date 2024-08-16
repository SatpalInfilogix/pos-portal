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
    //
    public function showAdminDashboard(){
        // get user details for the login
        if (! Gate::allows('backend')) {
            return redirect()->route('pos-dashboard');
        }

        $store_id = Auth::user()->store_id;
        if($store_id){
            $totalProducts =  StoreProduct::where('store_id',$store_id)->get()->count();
            $totalSaleInvoices = Order::where('store_id',$store_id)->get()->count();
            $totalSaleAmount = Order::where('store_id',$store_id)->get()->sum('TotalAmount');
            $totalInventoryReturn = ReturnStockProduct::where('store_id',$store_id)->get()->count();
        }else{
            $totalProducts = Product::whereHas('category', function ($query) {
                                    $query->where('status', 0); // Ensure that the category status is 0
                                })->get()->count();
            $totalSaleInvoices = Order::get()->count();
            $totalSaleAmount = Order::get()->sum('TotalAmount');
            $totalInventoryReturn = ReturnStockProduct::get()->count();
        }

        $adminUserobject = new AdminUserController();
        $adminUser = $adminUserobject->getAdminUserDetail();
        $totalCustomers = Customer::get()->count();
        
        
        $products = $this->getLatestProducts();

            return view('admin.index')->with([
                'userDetails'      => $adminUser,
                'products'         => $products,
                'totalCustomers'   => $totalCustomers,
                'totalProducts'    => $totalProducts,
                'totalSaleInvoices'=> $totalSaleInvoices,
                'totalInventoryReturn' => $totalInventoryReturn,
                'totalSaleAmount' => $totalSaleAmount
            ]);

    }
    
    private function getLatestProducts()
    {
        $products = Product::where('status', 0)
                            ->whereHas('category', function ($query) {
                                $query->where('status', 0); // Ensure that the category status is 0
                            })->latest()->limit(4)->get();

        foreach ($products as $proKey => $product) {
            $categoryName = $product->category ? $product->category->name : null;
            $price = $product->priceMaster ? $product->priceMaster->price : null;

            $products[$proKey]['categoryName'] = $categoryName;
            $products[$proKey]['price'] = $price;
        }
        return $products;
    }

    public function chartDetails(){

        $store_id = Auth::user()->store_id;
        if($store_id){
            $monthlySums = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(TotalAmount) as total_amount')
            ->where('store_id', $store_id)
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('YEAR(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
        }else{
            $monthlySums = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(TotalAmount) as total_amount')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        }


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

}
