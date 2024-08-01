<?php

namespace App\Http\Controllers;

/* Library Imports Starts Here */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\Product;
use App\Models\PriceMaster;
use App\Models\Customer;
use App\Models\Order;
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

        $adminUserobject = new AdminUserController();
        $adminUser = $adminUserobject->getAdminUserDetail();
        $totalCustomers = Customer::get()->count();
        $totalProducts = Product::get()->count();
        $totalSaleInvoices = Order::get()->count();
        $totalInventoryReturn = 0;
        $totalSaleAmount = Order::get()->sum('TotalAmount');
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
        $products = Product::where('status', 0)->latest()->limit(4)->get();

        foreach ($products as $proKey => $product) {
            $categoryName = $product->category ? $product->category->name : null;
            $price = $product->priceMaster ? $product->priceMaster->price : null;

            $products[$proKey]['categoryName'] = $categoryName;
            $products[$proKey]['price'] = $price;
        }
        return $products;
    }

}
