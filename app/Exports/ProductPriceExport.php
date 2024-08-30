<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ProductPriceExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    public function collection()
    {
        $products = Product::with('price')->latest()->get();
        $data = [];
        
        foreach ($products as $product) {
            $price = $product->price ? $product->price->price : '';
            $data[] = [
                'product_code' => $product->product_code,
                'price' => $price,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'product_code',
            'price',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
            'enclosure' => '', // Set enclosure to empty string to avoid quotes
            'escape' => '\\',
        ];
    }
}
