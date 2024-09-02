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
        $products = Product::latest()->get();
        $data = [];
        
        foreach ($products as $product) {
            $data[] = [
                'product_code' => $product->product_code,
                'quantites' => '',
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'product_code',
            'quantites',
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
