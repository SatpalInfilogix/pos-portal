<?php

namespace App\Services;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\EscposImage; 
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
        $imagePath = public_path('assets/img/PosLogo.png');
        $image = EscposImage::load($imagePath);
        $this->printer->bitImage($image);
        $this->printer->text("\n\n");
        $this->printer->text("Receipt\n");
        $this->printer->setEmphasis(true);
        $this->printer->text("Value Mfg. - Factory\n");
        $this->printer->setEmphasis(false);
        $this->printer->text("12 Eastwood Avenue\n");
        $this->printer->text("Kingston 10, St. And, Ja\n");
        $this->printer->text("(876)929-2211\n");

        // Print order details
        $this->printer->setJustification(Printer::JUSTIFY_LEFT);
        $this->printer->text("\n" . str_pad("Order Id: {$order->OrderID}", 38) . "Cashier\n");
        $this->printer->text(str_repeat('=', 48) . "\n");

        $this->printer->text("Date: " . now()->format('Y-m-d H:i') . "\n");
        $this->printer->text(str_repeat('=', 48) . "\n");

        $items_total = 0;
        // Print items
        foreach ($items as $item) {
            $items_total += $item['quantity'];
            $this->printOrderItem($item);
        }

        $this->printer->text(str_repeat('=', 48) . "\n");

        // Print total
        $this->printer->text("\n" . str_pad("Item Count: {$items_total}", 26) . 'Subtotal: $'.$order->TotalAmount - $order->TaxAmount);
        $this->printer->text("\n" . str_pad("", 19) . 'Sales Tax Total: $' . $order->TaxAmount);
        $this->printer->text(str_pad("", 26) . str_repeat('=', 24) . "\n");

        $this->printer->text("\n" . str_pad("", 24) . $order->PaymentMethod.': $'.$order->TotalAmount);
        $this->printer->text("\n\n");
        $this->printer->text("\n\n");
        $this->printer->text(str_repeat('=', 48) . "\n");
        $this->printer->text("\n\n");
        // Cut the paper and close the printer
        $this->printer->cut();
        $this->printer->close();
    }

    protected function printOrderItem($item)
    {
        $name = str_pad(substr($item['name'], 0, 29), 31);
        $quantity = str_pad($item['quantity'], 1, ' ', STR_PAD_LEFT);
        $price = str_pad($item['price'], 5, ' ', STR_PAD_LEFT);
        $item_total = str_pad($item['product_total_amount'], 5, ' ', STR_PAD_LEFT); 

        $this->printer->text($name. str_pad("", 5) . '$'.$item_total . "\n");
        $this->printer->text($quantity.' @  $'.$price . "\n\n");
    }
}
