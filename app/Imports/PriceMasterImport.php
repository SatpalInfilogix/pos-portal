<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\PriceMaster;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;

class PriceMasterImport implements ToModel, WithHeadingRow
{
    protected $errors = []; 
    /**
    * @param array $row
    * @return PriceMaster|null
    */
    public function model(array $row)
    {
        $product_code = $row['product_code'] ?? null;

        if (empty($product_code)) {
            return null;
        }

        $product = Product::where('product_code', $product_code)->first();

        if ($product) {
            $quantity = $this->sanitizeQuantity($row['quantites'] ?? 0);
            $price = isset($row['price']) ? $this->sanitizePrice($row['price']) : null;
            $manufacture_date = $row['manufacture_date'] ?? null;
            
            $isValidManufactureDate = false;

            if (isset($row['manufacture_date'])) {
                $expectedFormat = 'Y-m-d'; // Example format: year-month-day
                $separator = '-';

                try {
                    if (strpos($manufacture_date, $separator) === false) {
                        throw new Exception('The separation symbol could not be found in the date string');
                    }

                    $parsedDate = Carbon::createFromFormat($expectedFormat, $manufacture_date);
                    if ($parsedDate->format($expectedFormat) !== $manufacture_date) {
                        $this->errors[] = "The product code {$product_code} has an invalid manufacture date: {$manufacture_date}.";
                    } else {
                        $isValidManufactureDate = true;
                    }
                } catch (Exception $e) {
                    $this->errors[] = "The product code {$product_code} has an invalid manufacture date: {$manufacture_date}.";
                }
            } else if(isset($row['quantites'])){
                $this->errors[] = "The product code {$product_code} is missing a manufacture date.";
            }

            $productMaster = PriceMaster::where('product_id', $product->id)->first();

            if ($productMaster) {
                $productMaster->update([
                    'quantity' => ($productMaster->quantity ?? 0) + $quantity,
                    'price' => $price ?? $productMaster->price,
                    'manufacture_date' => $isValidManufactureDate ? $manufacture_date : $productMaster->manufacture_date,
                ]);
            } else {
                PriceMaster::create([
                    'product_id' => $product->id,
                    'quantity' => $quantity ?? null,
                    'price' => $price ?? null,
                    'manufacture_date' => $isValidManufactureDate ? $manufacture_date : null,
                    'created_by' => Auth::id(),
                ]);
            }
        }
    }
    public function getErrors()
    {
        return $this->errors;
    }

    private function sanitizeQuantity($quantity)
    {
        $sanitized = filter_var($quantity, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        $floatQuantity = (float)$sanitized;
        $roundedQuantity = round($floatQuantity);

        return $roundedQuantity > 0 ? (int)$roundedQuantity : 0;
    }

    private function sanitizePrice($input)
    {
        return preg_replace('/[^\d.]/', '', $input);
    }
}
