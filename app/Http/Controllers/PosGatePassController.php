<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Discount; 
use App\Models\Product; 
use App\Models\ProductOrderHistory; 

use Illuminate\Http\Request;

class PosGatePassController extends Controller
{
    public function printGatePass($invoice_id){

       $productDetails = ProductOrderHistory::where('order_id','=',$invoice_id)->get();
       $totalQuantity = $productDetails->sum('quantity');
       $pdf = PDF::loadView('admin.sales.sales-pdf-template.gate-pass-pdf',compact('invoice_id','productDetails','totalQuantity'));
       return $pdf->download($invoice_id.'-gatepass.pdf');

       //return view('admin.sales.sales-pdf-template.gate-pass-pdf',compact('invoice_id','productDetails','totalQuantity'));
    } 
}
