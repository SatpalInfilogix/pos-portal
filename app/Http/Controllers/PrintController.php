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
        try {
            $this->printerService->openCashDrawer();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Failed to open cash drawer.']);
        }
    }
}