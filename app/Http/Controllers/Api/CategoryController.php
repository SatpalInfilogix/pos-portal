<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $categories = Category::where('status', 0)->withCount(['products' => function ($query) {
            $query->where('status', 0); // Condition for products status
        }])->latest()->take(15)->get();

        $productsTotal = Category::where('status', 0)->with('products')->get();
        $totalProducts = $productsTotal->flatMap(function ($productCount) {
            return $productCount->products;
        })->count();

        return response()->json([
            'success' => true,
            'data'    => $categories,
            'all_categories_product'   => $totalProducts
        ]);
    }

    public function getCategoryProducts(Request $request)
    {
        $category = Category::where('id', $request->category_id)->with('products')->first();

        return response()->json([
            'success' => true,
            'data'    => $category
        ]);
    }
}
