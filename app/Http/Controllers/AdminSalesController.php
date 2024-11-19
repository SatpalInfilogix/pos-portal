<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrderHistory;
use App\Models\Store;
use Carbon\Carbon;  
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class AdminSalesController extends Controller
{
    //Sales Manager of the POS Sales

    //show the order details
    public function index(){
        if (!Gate::allows('view sales')) {
            abort(403);
        }

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
        $salesQuery = Order::where('OrderStatus', '!=', 'onhold')->select(['id', 'OrderId', 'TotalAmount', 'CustomerName', 'ShippingAddress', 'transit_status']);
        
        $store_id = Auth::user()->store_id;
        if ($store_id) {
            $salesQuery->where('store_id', $store_id);
        }

        if ($request->store_id) {
            $salesQuery->where('store_id', $request->store_id);
        }
        
        if ($request->start_date) {
            $startDate = \Carbon\Carbon::parse($request->start_date)->startOfDay();
            $salesQuery->where('created_at', '>=', $startDate);
        }
        
        if ($request->end_date) {
            $endDate = \Carbon\Carbon::parse($request->end_date)->endOfDay();
            $salesQuery->where('created_at', '<=', $endDate);
        }

        if ($request->yearly) {
            $yearlyValue = $request->yearly;
            if ($yearlyValue == 'Yearly') {
                $previousYear = Carbon::now()->subYear()->startOfDay();
                $today = Carbon::now();
                $salesQuery->whereBetween('created_at', [$previousYear, $today]);
            } elseif ($yearlyValue == 'Quatrely') {
                $previousMonths = Carbon::now()->subMonths(3)->startOfDay();
                $today = Carbon::now();
                $salesQuery->whereBetween('created_at', [$previousMonths, $today]);
            } elseif ($yearlyValue == 'Half Yearly') {
                $previousMonths = Carbon::now()->subMonths(6)->startOfDay();
                $today = Carbon::now();
                $salesQuery->whereBetween('created_at', [$previousMonths, $today]);
            }
        }
    
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
            $validColumns = ['id', 'OrderId', 'TotalAmount', 'CustomerName', 'ShippingAddress', 'transit_status'];
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
        $store_id = Auth::user()->store_id;
        if ($store_id) {
            return Order::where('store_id', $store_id)->where('OrderStatus', '!=', 'onhold')->latest()->get();
        }
        return Order::where('OrderStatus', '!=', 'onhold')->latest()->get();
    }

    public function downloadSalesDetail(Request $request)
    {
        $store_id = Auth::user()->store_id;
        if($store_id) {
            $storeId = $store_id;
        } else {
            $storeId = $request->input('store_id');
        }
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $yearly = $request->input('yearly');
        
        // Fetch data based on the parameters
        $sales = $this->getSalesData($startDate, $endDate, $yearly, $storeId);

        $pdf = \PDF::loadView('admin.sales.sales-pdf-template.sales-pdf', compact('sales'));
        return $pdf->download('sales-details.pdf');
        // return view('admin.sales.sales-pdf-template.sales-pdf',compact('sales'));
    }

    private function getSalesData($startDate, $endDate, $yearly, $storeId)
    {
        $query = Order::where('OrderStatus', '!=', 'onhold');
        
        if ($storeId) {
            $query->where('store_id', $storeId);
        }
        
        if ($startDate) {
            $start_date = \Carbon\Carbon::parse($startDate)->startOfDay();
            $query->whereDate('created_at', '>=', $start_date);
        }
        
        if ($endDate) {
            $end_date = \Carbon\Carbon::parse($endDate)->endOfDay();
            $query->whereDate('created_at', '<=', $end_date);
        }

        if ($yearly) {
            $yearlyValue = $yearly;
            if ($yearlyValue == 'Yearly') {
                $previousYear = Carbon::now()->subYear()->startOfDay();
                $today = Carbon::now();
                $query->whereBetween('created_at', [$previousYear, $today]);
            } elseif ($yearlyValue == 'Quatrely') {
                $previousMonths = Carbon::now()->subMonths(3)->startOfDay();
                $today = Carbon::now();
                $query->whereBetween('created_at', [$previousMonths, $today]);
            } elseif ($yearlyValue == 'Half Yearly') {
                $previousMonths = Carbon::now()->subMonths(6)->startOfDay();
                $today = Carbon::now();
                $query->whereBetween('created_at', [$previousMonths, $today]);
            }
        }

        return $query->get();
    }

    public function downloadItemWiseReportPrint(Request $request)
    {
        $storeId = Auth::user()->store_id ?: $request->input('store_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $yearly = $request->input('yearly');

        $sales = $this->getSalesDetailsData($startDate, $endDate, $yearly, $storeId);
        foreach ($sales as $key => $order) {
            $totalQuantity = 0;
            $totalAmount = 0;
            if (isset($order['product_details']) && is_array($order['product_details'])) {
                foreach ($order['product_details'] as $product) {
                    $quantity = isset($product['quantity']) ? (float)$product['quantity'] : 0;
                    $amount = isset($product['product_total_amount']) ? (float)$product['product_total_amount'] : 0.0;

                    $totalQuantity += $quantity;
                    $totalAmount += $amount;
                }
            }
            $store = Store::where('id', $order['store_id'])->first();
            $sales[$key]['store_name'] = $store ? $store->name : null;
            $sales[$key]['productTotalAmount'] = $totalAmount;
            $sales[$key]['productTotalQuantity'] = $totalQuantity;
        }

        $pdf = \PDF::loadView('admin.sales.sales-pdf-template.sales-report-pdf', compact('sales'));
        return $pdf->download('sales-report.pdf');
        // return view('admin.sales.sales-pdf-template.sales-report-pdf', compact('sales'));
    }

    public function downloadItemWiseReport(Request $request)
    {
        $storeId = Auth::user()->store_id ?: $request->input('store_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $yearly = $request->input('yearly');
    
        $sales = $this->getSalesDetailsData($startDate, $endDate, $yearly, $storeId);
        // Prepare CSV download
        $csvFileName = 'sales-report.csv';
        $handle = fopen('php://output', 'w');
    
        // Set headers for the CSV download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
    
        // Add CSV column headers
        fputcsv($handle, ['Order ID', 'Store Name', 'Total Quantity', 'Total Amount', 'Discount Amount', 'Tax Amount', 'Gross Total', 'Product Name', 'Quantity', 'Amount']);
    
        foreach ($sales as $order) {
            $store = Store::find($order['store_id']);
            $storeName = $store ? $store->name : null;
    
            // Calculate total quantities and amounts for the order
            $totalQuantity = 0;
            $totalAmount = 0;
            if (isset($order['product_details']) && is_array($order['product_details'])) {
                // First, calculate the total quantity and amount
                foreach ($order['product_details'] as $product) {
                    $quantity = isset($product['quantity']) ? (float)$product['quantity'] : 0;
                    $amount = isset($product['product_total_amount']) ? (float)$product['product_total_amount'] : 0.0;
    
                    $totalQuantity += $quantity;
                    $totalAmount += $amount;
                }
    
                // Then, write the product details to the CSV
                foreach ($order['product_details'] as $index => $product) {
                    $quantity = isset($product['quantity']) ? (float)$product['quantity'] : 0;
                    $amount = isset($product['product_total_amount']) ? (float)$product['product_total_amount'] : 0.0;
    
                    // Write to CSV, but only add totals on the first product row
                    if ($index === 0) {
                        fputcsv($handle, [
                            $order['OrderID'], // Assuming 'OrderID' is the order ID
                            $storeName,
                            $totalQuantity,      // Same total quantity for all products in this order
                            $totalAmount,        // Same total amount for all products in this order
                            $order['DiscountAmount'],
                            $order['TaxAmount'],
                            $order['TotalAmount'],
                            $product['name'],    // Product name
                            $quantity,
                            $amount,
                        ]);
                    } else {
                        // For subsequent products, just write product details without totals
                        fputcsv($handle, [
                            '', // Leave Order ID blank
                            '', // Leave Store Name blank
                            '', // Leave Total Quantity blank
                            '', // Leave Total Amount blank
                            '', // Leave Discount Amount blank
                            '', // Leave Tax Amount blank
                            '', // Leave Gross Total blank
                            $product['name'],    // Product name
                            $quantity,
                            $amount,
                        ]);
                    }
                }
            }
        }
    
        fclose($handle);
        exit;
    }    


    private function getSalesDetailsData($startDate, $endDate, $yearly, $storeId)
    {
        $query = Order::with('productDetails')->where('OrderStatus', '!=', 'onhold');

        if ($storeId) {
            $query->where('store_id', $storeId);
        }

        if ($startDate) {
            $query->whereDate('created_at', '>=', \Carbon\Carbon::parse($startDate)->startOfDay());
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', \Carbon\Carbon::parse($endDate)->endOfDay());
        }

        if ($yearly) {
            switch ($yearly) {
                case 'Yearly':
                    $query->whereBetween('created_at', [\Carbon\Carbon::now()->subYear()->startOfDay(), \Carbon\Carbon::now()]);
                    break;
                case 'Quarterly':
                    $query->whereBetween('created_at', [\Carbon\Carbon::now()->subMonths(3)->startOfDay(), \Carbon\Carbon::now()]);
                    break;
                case 'Half Yearly':
                    $query->whereBetween('created_at', [\Carbon\Carbon::now()->subMonths(6)->startOfDay(), \Carbon\Carbon::now()]);
                    break;
            }
        }

        return $query->get()->toArray(); // Convert to array if needed
    }
}
