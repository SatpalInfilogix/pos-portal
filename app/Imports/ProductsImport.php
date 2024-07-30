<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Http;
use App\Models\Category;
use App\Models\PriceMaster;
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
        $category_image = $row['category_image'] ?? '';

        if (empty($category_name)) {
            return null;
        }

        try {
            $category = Category::firstOrCreate(
                ['name' => $category_name],
                [
                    'image' => $this->uploadImageFromUrl('categories', $category_image),
                    'created_by' => Auth::id(),
                ]
            );
            $category->save();
        } catch (\Exception $e) {
            return null;
        }

        $product_units = null;
        if(isset($row['quantity'])){
            $product_units = explode(',', $row['quantity']);
            $product_units = json_encode($product_units);
        }
        
        if(!empty($row['product_code'])){
            $product_code = $row['product_code'];
        } else {
            $product = Product::orderByDesc('product_code')->first();
            if (!$product) {
                $product_code =  'PR0001';
            } else {
                $numericPart = (int)substr($product->product_code, 3);
                $nextNumericPart = str_pad($numericPart + 1, 4, '0', STR_PAD_LEFT);
                $product_code = 'PR' . $nextNumericPart;
            }
        }

        $product = Product::updateOrCreate(
            ['name' => $row['name']],
            [
                'units' => $product_units,
                'product_code' => $product_code,
                'manufacture_date' => $row['manufacture_date'],
                'category_id' => $category->id,
                'image' => $this->uploadImageFromUrl('products', $row['image']),
                'created_by' => Auth::id()
            ]
        );        

        $product_id = $product->id;

        return PriceMaster::updateOrCreate(
            [
                'product_id' => $product_id
            ],
            [
                'quantity'   => $row['quantity_count'],
                'quantity_type' => $row['quantity_type'],
                'price'        => $row['price'],
                'created_by'   => Auth::id(),
            ]
        );
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
