<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        $selectedCategoryId = $request->input('category_id');
        $perPage = $request->input('per_page', 6);

        $productsQuery = Product::where('status', 0)
                            ->whereHas('category', function ($query) {
                                $query->where('status', 0);
                            })->latest();

        if ($selectedCategoryId) {
            $productsQuery->where('category_id', $selectedCategoryId);
        }

        $products = $productsQuery->latest()->paginate($perPage);

        return response()->json([
            'success' => true,
            'data'    => $products
        ]);
    }
}
