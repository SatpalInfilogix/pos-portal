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
        $product_code = $row['product_code'] ?? NULL;  // Handle missing 'product_code'

        if (empty($product_code)) {
            return NULL;
        }

        $product = Product::where('product_code', $product_code)->first();

        if ($product) {
            $quantity = $this->sanitizeQuantity($row['quantites'] ?? 0);
            $price = $row['price'] ?? NULL;

            $productMaster = PriceMaster::where('product_id', $product->id)->first();

            if ($productMaster) {
                $productMaster->update([
                    'quantity'       => ($productMaster->quantity ?? 0) + $quantity,
                    'price'          => $price ?? $productMaster->price,
                    // 'quantity_type'  => $row['quantity_type'] ?? $productMaster->price,
                ]);
            } else {
                PriceMaster::create([
                    'product_id'     => $product->id,
                    'quantity'       => $quantity ?? NULL,
                    // 'quantity_type'  => $row['quantity_type'] ?? null,
                    'price'          => $price ?? NULL,
                    'created_by'     => Auth::id(),
                ]);
            }
        }
    }

    private function sanitizeQuantity($quantity)
    {
        $sanitized = filter_var($quantity, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        $floatQuantity = (float)$sanitized;
        $roundedQuantity = round($floatQuantity);

        return $roundedQuantity > 0 ? (int)$roundedQuantity : 0;
    }
}
