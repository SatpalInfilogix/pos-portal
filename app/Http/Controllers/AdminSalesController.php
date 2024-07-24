<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrderHistory;

class AdminSalesController extends Controller
{
    //Sales Manager of the POS Sales

    //show the order details
    public function index(){
        //getting all orders
        $allOrders = $this->getAllOrders();

        return view('admin.sales.index')->with([

            'orderSet' => $allOrders,
        ]);

    }
    public function show($id){

        $orders = Order::with('productDetails')->where('OrderID','=',$id)->first();
        $subTotal = ProductOrderHistory::where('order_id','=',$id)->sum('product_total_amount');
        return view('admin.sales.view')->with(["orders" => $orders, "subTotal" => $subTotal]);

    }
    //Get All Orders
    private function getAllOrders(){
        return Order::get();
    }

}
