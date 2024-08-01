<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ProductOrderHistory;
use App\Models\InventoryReturnOrder;
use App\Models\CustomerReturnCredit;
use App\Models\Product;
use App\Models\PriceMaster;
use App\Models\StoreProduct;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class InventoryReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = session()->get('invoices_for_inventory_return', []);
        return view('pos.invoices_for_inventory_return', compact('invoices'));
    }

    public function setInvoice(Request $request){        
        $invoiceID = $request->input('invoiceId');
        $invoices = session()->get('invoices_for_inventory_return', []);
       
        if (!in_array($invoiceID, $invoices)) {
            $invoices[] = $invoiceID;
        }

        session()->put('invoices_for_inventory_return', $invoices);

        $response = [
            'success' => true,
            'set_invoice' => $invoiceID,
            'invoices' => $invoices
        ];

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $invoice = Order::where('OrderID', '=', $request->invoice_id)->first();
        $orderProducts = ProductOrderHistory::where('order_id', $request->invoice_id)->get();

        return view('pos.inventory_return', compact('invoice', 'orderProducts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request;
        $checkReturnStock = InventoryReturnOrder::where('order_id','=',$request->invoiceId)->first();
        if($checkReturnStock){
            return response()->json(["error" => true,"invoice_id" => $request->invoiceId]);
        }else{
            $return_invoice_id = $this->generateInvoice();
            $priceCalculate = [];
            foreach($request->products as $details){

                    $orderHistory = ProductOrderHistory::where('order_id',$request->invoiceId)->where('product_id',$details['product_id'])->first();
                    $priceCalculate[] = $orderHistory->price * $details['quantity'];
                    $returnStock = InventoryReturnOrder::create([

                        "return_invoice_id" => $return_invoice_id,
                        "order_id" => $request->invoiceId,
                        "customer_id" => $request->customer_id,
                        "vehicle_number" => $request->vehicle_number,
                        "contact_number" => $request->contact_number,
                        "from_location" => $request->from_location,
                        "to_location" => $request->to_location,
                        "name" => $orderHistory->name,
                        "product_id" => $details['product_id'],
                        "quantity_type" => $orderHistory->quantity_type,
                        "quantity" => $details['quantity'],
                        "manufacture_date" => $orderHistory->manufacture_date,
                        "created_by" => $orderHistory->created_by,
                        "category_id" => $orderHistory->category_id,
                        "price" => $orderHistory->price,
                        "product_total_amount" => $orderHistory->price * $details['quantity'],

                    ]);

                    $updateQuantity = PriceMaster::where('product_id',$details['product_id'])->first();
                    $updateQuantity->quantity = $updateQuantity->quantity+$details['quantity'];
                    $updateQuantity->save();

                    $pdfDirectory = 'inventory-stock';
                    if (!Storage::disk('public')->exists($pdfDirectory)) {                 
                        Storage::disk('public')->makeDirectory($pdfDirectory);
                    }

                    $returnStocks = InventoryReturnOrder::where('order_id','=',$request->invoiceId)->get();
                    $totalProduct = InventoryReturnOrder::where('order_id','=',$request->invoiceId)->sum('quantity');
                    $vehicle_number = $request->vehicle_number;
                    $from_location = $request->from_location;
                    $to_location = $request->to_location;

                    // Generate PDF
                    $pdf = PDF::loadView('admin.stocks.stock-transfer-pdf-template.stock-transfer-pdf',compact('returnStocks','vehicle_number','totalProduct','from_location','to_location','return_invoice_id'));
                    $pdfContent = $pdf->output();
                    $pdfFileName = $return_invoice_id . '.pdf';
                    $invoicePath = $pdfDirectory . '/' . $pdfFileName;
            
                    // Save PDF to public disk
                    Storage::disk('public')->put($invoicePath, $pdfContent);
            
                    $publicUrl = Storage::disk('public')->url($invoicePath);

                    
            }
            $orderDetails = Order::where('OrderID',$request->invoiceId)->first();

            $customerReturnCredit = CustomerReturnCredit::create([
                "customer_id" => $request->customer_id,
                "credit_amount" => array_sum($priceCalculate),
                "debit_amount" => "",
                "invoice_id" => $request->invoiceId,
                "return_invoice_id" => $return_invoice_id,
                "total_amount" => $orderDetails->TotalAmount,
                "payment_method" => $request->payment_method,
            ]);
            return response()->json(["success" => true,"return_invoice_id" => $return_invoice_id, "inventory_pdf_url" => $publicUrl]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoiceDetails = InventoryReturnOrder::with('customerDetail')->where('return_invoice_id','=',$id)->first();
      // dd($invoiceDetails);
        $productDetails = InventoryReturnOrder::where('return_invoice_id','=',$id)->get();
        $totalAmount = InventoryReturnOrder::where('return_invoice_id','=',$id)->sum('product_total_amount');
        
        return view('admin.stocks.view')->with(['invoiceDetails'=> $invoiceDetails, "productDetails" => $productDetails, "totalAmount" => $totalAmount]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateInvoice(){

        $latestOrder = InventoryReturnOrder::orderBy('id', 'desc')->first();
        if (!$latestOrder) {
            return 'INV-000001';
        }
    
        $latestOrderId = $latestOrder->OrderID;
        $number = intval(substr($latestOrderId, 4)) + 1;
        return 'INV-' . str_pad($number, 6, '0', STR_PAD_LEFT);

    }

    public function returnStockList(){

        $returnStocks = InventoryReturnOrder::with('customerDetail')->get()->unique('return_invoice_id');
        return view('admin.stocks.index')->with([
            "returnStocks" => $returnStocks
        ]);
        
    }

    public function availableProductQuantity(Request $request)
    {
        $availableProductQuantity = [];
        foreach($request->product_ids as $key =>  $product_id){
            $product = StoreProduct::where('product_id', $product_id)
                ->where('store_id', Auth::user()->store_id)
                ->first();
            $availableProductQuantity[$key]['product_id'] = $product_id;
            $availableProductQuantity[$key]['product_quantity'] = 0;
            if($product) {
                $availableProductQuantity[$key]['product_quantity'] = $product->quantity;
            }
        }

        return response()->json([
            'success'         => true,
            'productQuantity' => $availableProductQuantity
        ]);
    }

}
