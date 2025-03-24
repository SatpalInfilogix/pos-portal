<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductOrderHistory;
use App\Models\StoreProduct;
use App\Models\PriceMaster;
use App\Models\Discount;
use App\Models\HoldOrder;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function getOrders()
    {
        $orders = Order::where('CreatedBy', Auth::id())->where('OrderStatus','completed')->orderBy('OrderID', 'DESC')->get();

        return response()->json([
            'success' => true,
            'message' => 'Order list.',
            'data'    => $orders
        ]);
    }

    public function placeOrder(Request $request)
    { 
        $invoice_id = $request->invoiceId;
        $store_id = Auth::user()->store_id;
        $customer = Customer::where('contact_number', '=', $request->contact_number)->first();
        if ($request->email && $request->contact_number) {
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
        }
        $cart = json_decode($request->cart, true);
        if (is_null($cart)) {
            return response()->json(['success' => false, 'message' => 'Invalid cart data.'], 400);
        }
        $discountDetails = [];
        if (isset($cart['discount_amount']) && !empty($cart['discount_amount'])) {
            $discountDetails = $cart['discount'];
        }

        // Payment Process
        if ($request->payment_method == 'Cash') {
            $status = ["payment" => "success"];
        } elseif ($request->payment_method == 'Debit Card') {
            $status = $this->typeDebitCard();
        }

        // Payment Success
        if ($status['payment'] == 'success') {
            $order = Order::updateOrCreate([
                'CreatedBy' => Auth::id(),
                'OrderID' => $invoice_id,
            ],
            [
                'OrderDate' => now(),
                'CustomerID' => $customer->id ?? NULL,
                'CustomerName' => $request->customer_name,
                'CustomerEmail' => $request->email,
                'CustomerPhone' => $request->contact_number,
                'ShippingAddress' => $request->billing_address,
                'BillingAddress' => $request->billing_address,
                'OrderStatus' => 'completed',
                'PaymentMethod' => $request->payment_method,
                'PaymentStatus' => 'success',
                'TotalAmount' => str_replace(',','',$cart['payable']),
                'TaxAmount' => $cart['tax'],
                'DiscountAmount' => $cart['discount_amount'],
                'VehicleNumber' => $request->vehicle_number,
                'tender_amount' => $request->tender_amount,
                'change_amount' => $request->order_change_amount,
                'card_digits' => $request->card_digits,
                'store_id' => $store_id,
            ]);

            $returnProductDetails = [];
            foreach ($cart['products'] as $product) {
                $productDetails = Product::find($product['id']);
                $returnProductDetails[] = ["product_id" => $product['id'], "quantity" =>  $product['quantity']];
                $productHistory = ProductOrderHistory::create([
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

            // $pdfUrl = route('gate-pass.view', ['orderId' => $order->OrderID]);

            return response()->json([
                'success' => true,
                'message' => 'Order Placed',
                'orderId' => $invoice_id,
                // 'gatePass' => $pdfUrl,
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

    public function holdOrder(Request $request)
    {
        $invoice_id = $this->generateInvoice();
        $cart = json_decode($request->cart, true);
        $order = Order::create([
            'OrderDate' => now(),
            'OrderID' => $invoice_id,
            'OrderStatus' => 'onhold',
            'PaymentStatus' => 'pending',
            'TotalAmount' => $cart['payable'],
            'TaxAmount' => $cart['tax'],
            'DiscountAmount' => $cart['discount_amount'],
            'CreatedBy' => Auth::id(),
        ]);

        $holdOrder = HoldOrder::create([
            'order_id' => $order->id,
            'cart'     => json_encode($cart)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Order On Hold',
            'orderId' => $invoice_id,
            'orderDate' => now(),
            'totalAmount' => $cart['payable'],
        ]);
    }

    public function getHoldOrder(Request $request)
    {
        $order =  Order::with('holdOrder')->where('orderStatus', 'onhold')->get();

        return response()->json([
            'success' => true,
            'message' => 'Hold Order Listing.',
            'data'    => $order
        ]);
    }

    public function continueHoldOrder(Request $request)
    {
        $orderId = $request->order_id;
        $order = Order::where('OrderId', $orderId)->where('OrderStatus', 'onhold')->first();
        if (!$order) {
            return response()->json(['error' => 'Order not found or not on hold'], 404);
        }

        $holdOrder = HoldOrder::where('order_id', $order->id)->first();
        if (!$holdOrder) {
            return response()->json(['error' => 'Hold order not found'], 404);
        }

        $cart = json_decode($holdOrder->cart, true);

        $cart['orderId']  = $orderId;

        // $order->update([
        //     'OrderStatus' => 'pending',
        // ]);

        // HoldOrder::where('order_id', $order->id)->delete();

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'message' => 'Cart updated successfully with hold order products. Hold order have been deleted.'
        ]);
    }

    public function UnPaidOrder()
    {
        $unPaidOrders = Order::where('CreatedBy',Auth::user()->id)->where('OrderStatus','unpaid')->orderBy('OrderID', 'DESC')->get();

        return response()->json([
            'success' => true,
            'message' => 'Unpaid Listing.',
            'data'    => $unPaidOrders
        ]);
    }

    public function paidOrder()
    {
        $paidOrders = Order::where('CreatedBy',Auth::user()->id)->where('OrderStatus','completed')->orderBy('OrderID', 'DESC')->get();

        return response()->json([
            'success' => true,
            'message' => 'Unpaid Listing.',
            'data'    => $paidOrders
        ]);
    }

    public function getTransaction(Request $request)
    {
        $recentTransaction = Order::select(['created_at', 'OrderID', 'CustomerName', 'TotalAmount'])->where('CreatedBy',Auth::user()->id);
        if ($request->order_id) {
            $recentTransaction = $recentTransaction->where('OrderId', $request->order_id);
        }

        if($request->customer_name) {
            $recentTransaction = $recentTransaction->where('CustomerName', $request->customer_name);
        }

        if($request->amount) {
            $recentTransaction = $recentTransaction->where('TotalAmount', $request->amount);
        }

        if($request->date) {
            $recentTransaction = $recentTransaction->whereDate('created_at', $request->date);
        }

        $recentTransaction = $recentTransaction->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Recent Transaction Listing.',
            'data'    => $recentTransaction
        ]);
    }
}
