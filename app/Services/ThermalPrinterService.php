<?php

namespace App\Services;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class ThermalPrinterService
{
    protected $printer;

    public function __construct()
    {
        $connector = new WindowsPrintConnector('TM-T82X');
        $this->printer = new Printer($connector);
    }

    public function testPrint()
    {
        $this->printer->text("Testing Printer (line 1)\n");
        $this->printer->text("Testing Printer (line 2)\n");
        $this->printer->text("Testing Printer (line 3)\n");
        $this->printer->text("Testing Printer (line 4)\n");
        $this->printer->text("Testing Printer (line 5)\n");
        // Cut the paper and close the printer
        $this->printer->cut();
        $this->printer->close();
    }

    public function openCashDrawer()
    {
        $this->printer->pulse();
        $this->printer->close();

        return response()->json(['message' => 'Cash drawer opened']);
    }


    public function printOrderReceipt($order, $items)
    {
        // Print shop name
        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->text("Your Shop Name\n");

        // Print order details
        $this->printer->setJustification(Printer::JUSTIFY_LEFT);
        $this->printer->text("Order #: {$order->OrderID}\n");
        $this->printer->text("Date: " . now()->format('Y-m-d H:i') . "\n");

        // Print header
        $this->printer->text("\n" . str_pad("Product", 28) . str_pad("Qty", 10) . "Amount\n");
        $this->printer->text(str_repeat('-', 48) . "\n"); // Separator

        // Print items
        foreach ($items as $item) {
            $this->printLine($item['name'], $item['quantity'], $item['price']);
        }

        // Print total
        $this->printer->text("\n" . str_pad("Payment Method", 39) . $order->PaymentMethod);
        $this->printer->text("\n" . str_pad("Subtotal", 39) . '$' . $order->TotalAmount - $order->TaxAmount);
        $this->printer->text("\n" . str_pad("Tax (GCT 15%)", 39) . '$' . $order->TaxAmount);
        $this->printer->text("\n" . str_pad("Total", 39) . '$' . $order->TotalAmount);
        $this->printer->text("\n\n");
        // Cut the paper and close the printer
        $this->printer->cut();
        $this->printer->close();
    }

    protected function printLine($name, $quantity, $price)
    {
        $name = str_pad(substr($name, 0, 24), 26);
        $quantity = str_pad($quantity, 3, ' ', STR_PAD_LEFT);
        $price = str_pad($price, 5, ' ', STR_PAD_LEFT); // Add padding to align prices
        $this->printer->text($name . $quantity . str_pad("", 10) . '$'.$price . "\n");
    }
}
