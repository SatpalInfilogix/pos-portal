<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrderHistory;
use App\Models\Store;

class AdminSalesController extends Controller
{
    //Sales Manager of the POS Sales

    //show the order details
    public function index(){
        //getting all orders
        $allOrders = $this->getAllOrders();
        $stores = Store::where('is_deleted',0)->get();
        return view('admin.sales.index')->with([
            'orderSet' => $allOrders,
            'stores' => $stores,
        ]);

    }

    public function getSalesOrder(Request $request)
    {
        $maxItemsPerPage = 10;
    
        // Base query
        $salesQuery = Order::select(['id', 'OrderId', 'TotalAmount', 'CustomerName', 'ShippingAddress', 'transit_status']);
    
        // Search filter
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $salesQuery->where('OrderId', 'like', '%' . $searchValue . '%')
                        ->orWhere('TotalAmount', 'like', '%' . $searchValue . '%')
                        ->orWhere('CustomerName', 'like', '%' . $searchValue . '%')
                        ->orWhere('ShippingAddress', 'like', '%' . $searchValue . '%')
                        ->orWhere('transit_status', 'like', '%' . $searchValue . '%');
        }
    
        // Sorting
        if ($request->has('order')) {
            $orderColumnIndex = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumnIndex]['data'];
    
            // Sort by valid columns only
            $validColumns = ['id', 'OrderId', 'TotalAmount', 'CustomerName', 'ShippingAddress', 'transit_status']; // Define valid columns
            if (in_array($column, $validColumns)) {
                $salesQuery->orderBy($column, $orderDirection);
            }
        }
    
        // Pagination
        $totalRecords = $salesQuery->count();
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = (int) ($request->input('start', 0) / $perPage);
        $sales = $salesQuery->skip($currentPage * $perPage)->take($perPage)->get();
    
        // Respond with data
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords, // Adjust if filtered records are different
            "data" => $sales
        ]);
    }

    public function getSalesOrderByStore(Request $request){
        $maxItemsPerPage = 10;
    
        // Base query
        $salesQuery = Order::select(['id', 'OrderId', 'TotalAmount', 'CustomerName', 'ShippingAddress', 'transit_status']);
    
        // Search filter
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $salesQuery->where('OrderId', 'like', '%' . $searchValue . '%')
                        ->orWhere('TotalAmount', 'like', '%' . $searchValue . '%')
                        ->orWhere('CustomerName', 'like', '%' . $searchValue . '%')
                        ->orWhere('ShippingAddress', 'like', '%' . $searchValue . '%')
                        ->orWhere('transit_status', 'like', '%' . $searchValue . '%');
        }
    
        // Sorting
        if ($request->has('order')) {
            $orderColumnIndex = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumnIndex]['data'];
    
            // Sort by valid columns only
            $validColumns = ['id', 'OrderId', 'TotalAmount', 'CustomerName', 'ShippingAddress', 'transit_status']; // Define valid columns
            if (in_array($column, $validColumns)) {
                $salesQuery->orderBy($column, $orderDirection);
            }
        }
    
        // Pagination
        $totalRecords = $salesQuery->count();
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = (int) ($request->input('start', 0) / $perPage);
        $sales = $salesQuery->skip($currentPage * $perPage)->take($perPage)->get();
    
        // Respond with data
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords, // Adjust if filtered records are different
            "data" => $sales
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
