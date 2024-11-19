<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use App\Models\PriceMaster;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $category_name = $row['category_name'];
        // $category_image = $row['category_image'] ?? '';

        if (empty($category_name)) {
            return null;
        }

        try {
            $category = Category::firstOrCreate(
                ['name' => $category_name],
                [
                    // 'image' => $this->uploadImageFromUrl('categories', $category_image),
                    'created_by' => Auth::id(),
                ]
            );
            $category->save();
        } catch (\Exception $e) {
            return null;
        }

        $product_units = null;
        if(isset($row['unit'])){
            $unitData = Unit::firstOrCreate(
                ['name' => $row['unit']]
            );
            $product_units = $unitData->id;
        }

        // Extract initials from category and product names
        $category_initials = $this->getInitials($category_name);
        $product_initials = $this->getInitials($row['name'] ?? 'Product');
        
        // Fetch the last product code to generate the next sequential number
      /*  $last_product = Product::orderByDesc('product_code')->first();
        
        if (!$last_product) {
            $product_code = $category_initials . $product_initials . '000001';
        } else {
            // Extract the prefix and numeric part from the last product code
            $last_product_code = $last_product->product_code;
            $prefix_length = strlen($category_initials . $product_initials);
            $numericPart = substr($last_product_code, $prefix_length);
            
            // Increment and pad with zeros
            $nextNumericPart = str_pad((int)$numericPart + 1, 6, '0', STR_PAD_LEFT);
            $product_code = $category_initials . $product_initials . $nextNumericPart;
        }*/
        $productCodeCheck = Product::where('name', $row['name'])->first();
        if($productCodeCheck) {
            $product_code = $productCodeCheck->product_code;
        } else {
            $product_code = $category_initials . $product_initials . $this->generateProductCode();
        }
        
        $image = '';
        if($row['image']){
            $image = $this->uploadImageFromUrl('products', $row['image']);
        }
        $product = Product::updateOrCreate(
            ['name' => $row['name']],
            [
                'units' => $product_units,
                'product_code' => $product_code,
                'category_id' => $category->id,
                'image' => $image,
                'created_by' => Auth::id(),
                // 'is_active'  => $row['is_active'] ?? 1
            ]
        );        

        $product_id = $product->id;

        // return PriceMaster::updateOrCreate(
        //     [
        //         'product_id' => $product_id
        //     ],
        //     [
        //         'quantity'   => $row['quantity_count'],
        //         'quantity_type' => $row['quantity_type'],
        //         'price'        => $row['price'],
        //         'created_by'   => Auth::id(),
        //     ]
        // );
    }

    // Helper function to get initials from a name
    private function getInitials($name)
    {
        $name = preg_replace('/[^\w\s]/', '', $name);
        $words = explode(' ', $name);
        $initials = '';
        foreach ($words as $word) {
            $word = trim($word);
            if (strlen($word) > 0) {
                $initials .= strtoupper(substr($word, 0, 1)); // Take the first character
            }
        }
        return $initials;
    }
    public function generateProductCode()
    {
        $latestOrder = Product::orderBy('id', 'desc')->first();
        if (!$latestOrder) {
            return '000001';
        }

        $latestOrderId = $latestOrder->product_code;
        $number = intval(substr($latestOrderId, -6)) + 1;
        return str_pad($number, 6, '0', STR_PAD_LEFT);
    }

    public function uploadImageFromUrl(string $folderName, string $imageUrl): string
    {
        // Get the image content from the URL
        $response = Http::get($imageUrl);

        if ($response->failed()) {
            Log::error('Failed to fetch image from URL: ' . $imageUrl);
            return '';
        }

        // Get the image content and MIME type
        $imageContent = $response->body();
        $mimeType = $response->header('Content-Type');

        // Generate a unique filename for the downloaded image
        $filename = time() . '.' . $this->getExtensionFromMimeType($mimeType);

        // Define the path where you want to save the image
        $savePath = public_path('uploads/'.$folderName.'/' . $filename);

        // Ensure the directory exists
        $directory = dirname($savePath);
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        // Save the image content to the defined path
        file_put_contents($savePath, $imageContent);

        // Return the path to the saved image
        return 'uploads/'.$folderName.'/' . $filename;
    }

    private function getExtensionFromMimeType($mimeType)
    {
        $mimeToExtension = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/bmp' => 'bmp',
            'image/webp' => 'webp',
        ];

        return $mimeToExtension[$mimeType] ?? 'jpg';
    }
}
