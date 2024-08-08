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
        $this->printerService->testPrint();
        return response()->json(['success' => true]);
    }

    public function openCashDrawer()
    {
        $this->printerService->openCashDrawer();
        return response()->json(['success' => true]);
    }
}
