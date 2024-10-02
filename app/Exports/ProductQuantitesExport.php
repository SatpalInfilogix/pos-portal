<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ProductQuantitesExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    public function collection()
    {
        $products = Product::with('price')->latest()->get();
        $data = [];
        
        foreach ($products as $product) {
            $manufacture_date =  $product->price ? $product->price->manufacture_date: '';

            $data[] = [
                'product_code' => $product->product_code,
                'quantites' => '',
                'manufacture_date' => $manufacture_date

            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'product_code',
            'quantites',
            'manufacture_date'
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
