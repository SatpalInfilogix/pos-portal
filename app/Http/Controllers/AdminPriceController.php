<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PriceMaster;
use App\Models\Product;

class AdminPriceController extends Controller
{
    public function index()
    {
        $prices = PriceMaster::with('product')->latest()->get();

        return view('admin.prices.index', compact('prices'));
    }

    public function autocomplete(Request $request)
    {
        $searchTerm = $request->input('input');
        $products = Product::where('status', 0)->where('name', 'like', '%' . $searchTerm . '%')->get(['id', 'name']);

        return response()->json($products);
    }

    public function create()
    {
        return view('admin.prices.create');
    }

    public function store(Request $request)
    {
        $product = Product::where('name', $request->product)->first();
        if($product) {
            $product_id = $product->id;
            PriceMaster::create([
                'product_id'        => $product_id,
                'quantity'          => $request->quantityValue,
                'quantity_type'     => $request->quantity,
                'price'             => $request->price,
                'created_by'        => Auth::id(),
            ]);

            return redirect()->route('prices.index')->with('success', 'Price created successfully.');
        } else {
            return redirect()->route('prices.index')->with('success', 'Price not found.'); 
        }
    }

    public function edit($id) 
    {
        $price = PriceMaster::with('product')->where('id', $id)->first(); // Fetch the product by ID

        return view('admin.prices.edit', compact('price'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('name', $request->product)->first();
        if($product) {
            $product_id = $product->id;
            PriceMaster::where('id', $id)->update([
                'product_id'        => $product_id,
                'quantity'          => $request->quantityValue,
                'quantity_type'     => $request->quantity,
                'price'             => $request->price,
                'created_by'        => Auth::id(),
            ]);

            return redirect()->route('prices.index')->with('success', 'Price Updated successfully.');
        } else {
            return redirect()->route('prices.index')->with('success', 'Product not found.'); 
        }
    }

    public function destroy($id)
    {
        $priceData = PriceMaster::where('id', $id)->first();

        if ($priceData) {
            if ($priceData->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }

            $priceData->update([
                'status' => $status
            ]);
            return response()->json(['status' => 'success', 'price'=> $status, 'message' => 'Category deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Category not found.'], 404);
        }
    }
}
