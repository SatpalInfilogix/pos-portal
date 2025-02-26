<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        $selectedCategoryId = $request->input('category_id');
        $store_id = Auth::user()->store_id;
        $perPage = $request->input('per_page', 6);

        $query = Product::with(['category', 'storeProducts' => function ($query) use ($store_id) {
            $query->where('store_products.store_id', $store_id);
        }, 'priceMaster'])
        ->whereHas('category', function ($query) {
            $query->where('status', 0);
        });

        if (isset($store_id)) {
            $query->where('is_active', 0);
        }

        if ($selectedCategoryId) {
           $query->where('category_id', $selectedCategoryId);
        }

        $products = $query->latest()->paginate($perPage);

        $products->getCollection()->transform(function ($product) {
            $product->available_quantity = $product->storeProducts->sum('quantity') ?: 0; // Calculate available quantity
            return $product;
        });

        return response()->json([
            'success' => true,
            'data'    => $products
        ]);
    }
}
