<?php

namespace App\Http\Controllers;

use App\Services\ThermalPrinterService;

class PrintController extends Controller
{
    protected $printerService;

    public function __construct(ThermalPrinterService $printerService)
    {
        $this->printerService = $printerService;
    }

    public function printReceipt()
    {
        $order = [
            'order_number' => '12345',
            'items' => [
                ['name' => 'Product A', 'quantity' => 1, 'price' => '10.00'],
                ['name' => 'Long Product Name Example B Testing', 'quantity' => 2, 'price' => '200000.00'],
                ['name' => 'Another Product C', 'quantity' => 1, 'price' => '15.00'],
            ],
            'total' => '45.00',
        ];        
        
        $this->printerService->printOrderReceipt($order);
        return response()->json(['status' => 'success']);
    }
}
