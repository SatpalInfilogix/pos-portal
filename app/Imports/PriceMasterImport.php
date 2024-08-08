<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\PriceMaster;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PriceMasterImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    * @return PriceMaster|null
    */
    public function model(array $row)
    {
        $product_code = $row['product_code'] ?? null;  // Handle missing 'product_code'

        if (empty($product_code)) {
            return null;
        }

        $product = Product::where('product_code', $product_code)->first();

        if ($product) {
            $productMaster = PriceMaster::where('product_id', $product->id)->first();

            if ($productMaster) {
                $productMaster->update([
                    'quantity'       => ($productMaster->quantity ?? 0) + ($row['quantites'] ?? 0),
                    'price'          => $row['price'] ?? $productMaster->price,
                    'quantity_type'  => $row['quantity_type'] ?? $productMaster->price,
                ]);
            } else {
                PriceMaster::create([
                    'product_id'     => $product->id,
                    'quantity'       => $row['quantites'] ?? null,
                    'quantity_type'  => $row['quantity_type'] ?? null,
                    'price'          => $row['price'] ?? null,
                    'created_by'     => Auth::id(),
                ]);
            }
        }
    }
}
