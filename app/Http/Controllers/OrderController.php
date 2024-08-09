<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductOrderHistory;
use App\Models\PriceMaster;
use App\Models\StoreProduct;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;
use App\Services\ThermalPrinterService;

class OrderController extends Controller
{
    protected $printerService;

    public function __construct(ThermalPrinterService $printerService)
    {
        $this->printerService = $printerService;
    }

    public function POSSaleSubmission(Request $request)
    {
        // Create Customer
        $invoice_id = $this->generateInvoice();
        $store_id = Auth::user()->store_id;
        $customer = Customer::where('contact_number', '=', $request->contact_number)->first();
        if (!$customer) {
            $customer = Customer::create([
                'customer_name' => $request->customer_name,
                'customer_email' => $request->email,
                'contact_number' => $request->contact_number,
                'alternate_number' => $request->alternate_number,
                'billing_address' => $request->billing_address,
                'billing_address_pin_code' => $request->billing_address_pin_code,
                'created_by' => Auth::id(),
            ]);
        } else {
            $customer->customer_email = $request->email;
            $customer->billing_address = $request->billing_address;
            $customer->billing_address_pin_code = $request->billing_address_pin_code;
            $customer->save();
        }
        $cart  = session('cart');
        $customerDetails = $request;
        $discountDetails = [];

        if (isset($cart['discount_amount']) && !empty($cart['discount_amount'])) {
            $discountDetails = $cart['discount'];
        }

        // Payment Process
        if ($request->payment_method == 'cash') {

            $status = ["payment" => "success"];

        } elseif ($request->payment_method == 'debit-card') {

            $status = $this->typeDebitCard();

        }

        // Payment Success

        if ($status['payment'] == 'success') {
            // Create Order
            $order = Order::create([
                'OrderDate' => now(),
                'OrderID' => $invoice_id,
                'CustomerID' => $customer->id,
                'CustomerName' => $request->customer_name,
                'CustomerPhone' => $request->contact_number,
                'ShippingAddress' => $request->billing_address,
                'BillingAddress' => $request->billing_address,
                'OrderStatus' => 'completed',
                'PaymentMethod' => $request->payment_method,
                'PaymentStatus' => 'success',
                'TotalAmount' => $cart['payable'],
                'TaxAmount' => $cart['tax'],
                'DiscountAmount' => $cart['discount_amount'],
                'tender_amount' => $request->tender_amount,
                'change_amount' => $request->order_change_amount,
                'card_digits' => $request->card_digits,
                'CreatedBy' => Auth::id(),
                'store_id' => $store_id,
            ]);

            try {
                $this->printerService->printOrderReceipt($order, $cart['products']);
            } catch (\Exception $e) {
                // Handle priter communication failure
            }

            $returnProductDetails = [];
            foreach ($cart['products'] as $product) {
                $productDetails = Product::find($product['id']);
                $returnProductDetails[] = ["product_id" => $product['id'], "quantity" =>  $product['quantity']];
                $order = ProductOrderHistory::create([
                    'order_id' => $invoice_id,
                    'product_id' => $productDetails->id,
                    'name' => $productDetails->name,
                    'quantity_type' => $productDetails->quantity,
                    'quantity' => $product['quantity'],
                    'manufacture_date' => $productDetails->manufacture_date,
                    'lot_number' => $productDetails->lot_number,
                    'image' => $productDetails->image,
                    'status' => $productDetails->status,
                    'created_by' => Auth::id(),
                    'category_id' => $productDetails->category_id,
                    'price' => $product['price'],
                    'product_total_amount' => $product['product_total_amount']
                ]);

                if (isset($store_id)) {
                    $updateInventory = StoreProduct::where('store_id', $store_id)->where('product_id', $productDetails->id)->first();
                    $totalQty = $updateInventory->quantity - $product['quantity'];
                    if ($totalQty <= 0) {
                        $totalQty = 0;
                    }
                    $updateInventory->update([
                        "quantity" => $totalQty
                    ]);
                } else {
                    $priceMaster = PriceMaster::where('product_id', $productDetails->id)->first();
                    $totalQty = $priceMaster->quantity - $product['quantity'];
                    if ($totalQty <= 0) {
                        $totalQty = 0;
                    }
                    $priceMaster->update([
                        "quantity" => $totalQty
                    ]);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Order Placed',
                'orderId' => $invoice_id,
                'totalAmount' => $cart['payable'],
                'orderDate' => now(),
                'customerName' => $request->customer_name,
                'returnProductDetails' => $returnProductDetails
            ]);
        }
    }

    public function typeDebitCard()
    {
        $payment = 'success';
        return ["payment" => $payment];
    }

    public function generateInvoice()
    {

        $latestOrder = Order::orderBy('id', 'desc')->first();
        if (!$latestOrder) {
            return 'INV-000001';
        }

        $latestOrderId = $latestOrder->OrderID;
        $number = intval(substr($latestOrderId, 4)) + 1;
        return 'INV-' . str_pad($number, 6, '0', STR_PAD_LEFT);
    }

    public function searchInvoice($invoice_id)
    {

        $invoice = Order::where('OrderID', '=', $invoice_id)->first();
        return response()->json(compact('invoice'));
    }
    public function viewInvoice($invoice_id)
    {

        $invoice = Order::where('OrderID', '=', $invoice_id)->first();
        echo '<pre>';
        print_r($invoice);
    }

    public function posHoldOrder()
    {

        $invoice_id = $this->generateInvoice();

        $cart  = session('cart');
        $order = Order::create([
            'OrderDate' => now(),
            'OrderID' => $invoice_id,
            'OrderStatus' => 'onhold',
            'PaymentStatus' => 'success',
            'TotalAmount' => $cart['payable'],
            'TaxAmount' => $cart['tax'],
            'DiscountAmount' => $cart['discount_amount'],
            'CreatedBy' => Auth::id(),
        ]);

        foreach ($cart['products'] as $product) {
            $productDetails = Product::find($product['id']);
            $order = ProductOrderHistory::create([
                'order_id' => $invoice_id,
                'product_id' => $productDetails->id,
                'name' => $productDetails->name,
                'quantity_type' => $productDetails->quantity,
                'quantity' => $product['quantity'],
                'manufacture_date' => $productDetails->manufacture_date,
                'lot_number' => $productDetails->lot_number,
                'image' => $productDetails->image,
                'status' => $productDetails->status,
                'created_by' => Auth::id(),
                'category_id' => $productDetails->category_id,
                'price' => $product['price'],
                'product_total_amount' => $product['product_total_amount']
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Order On Hold',
            'orderId' => $this->generateInvoice(),
            'totalAmount' => $cart['payable'],
            'orderDate' => now()
        ]);
    }
}
