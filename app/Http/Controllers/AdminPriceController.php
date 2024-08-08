<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PriceMaster;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

class AdminPriceController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view prices')) {
            abort(403);
        }

        $prices = PriceMaster::with('product')->latest()->get();

        return view('admin.prices.index', compact('prices'));
    }

    public function getPrices(Request $request)
    {
        $maxItemsPerPage = 10;
    
        // Base query
        $pricesQuery = PriceMaster::select(['price_masters.id', 'price_masters.price', 'price_masters.quantity', 'price_masters.product_id', 'price_masters.status', 'products.product_code', 'products.name as product_name'])
            ->join('products', 'price_masters.product_id', '=', 'products.id'); // Join the products table
    
        // Search filter
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $pricesQuery->where(function($query) use ($searchValue) {
                $query->where('products.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('products.product_code', 'like', '%' . $searchValue . '%')
                    ->orWhere('price_masters.price', 'like', '%' . $searchValue . '%');
            });
        }
    
        // Sorting
        if ($request->has('order')) {
            $orderColumnIndex = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumnIndex]['data'];
    
            // Sort by valid columns only
            $validColumns = ['id', 'price', 'quantity', 'status', 'product_code', 'product_name'];
            if (in_array($column, $validColumns)) {
                if ($column === 'product_code') {
                    $pricesQuery->orderBy('products.product_code', $orderDirection);
                } elseif ($column === 'product_name') {
                    $pricesQuery->orderBy('products.name', $orderDirection);
                } else {
                    $pricesQuery->orderBy('price_masters.' . $column, $orderDirection);
                }
            }
        }
    
        // Pagination
        $totalRecords = $pricesQuery->count();
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = (int) ($request->input('start', 0) / $perPage);
        $prices = $pricesQuery->skip($currentPage * $perPage)->take($perPage)->get();
    
        // Respond with data
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords, // Adjust if filtered records are different
            "data" => $prices
        ]);
    }

    public function getUnits($id)
    {
        $product = Product::where('status', 0)->where('id', $id)->first();
        $units = json_decode($product->units, true) ?: [];
        $options='<option value="" selected disabled>Select Unit</option>';
        if($units) {
            foreach($units as $unit)
            {
                $options .= '<option value="'.  $unit .'">'. $unit .'</option>';
            }
        }

        return response()->json([
            'options' => $options,
        ]);
    }

    public function create()
    {
        if (!Gate::allows('create prices')) {
            abort(403);
        }

        return view('admin.prices.create');
    }

    public function store(Request $request)
    {
        PriceMaster::create([
            'product_id'        => $request->product,
            'quantity'          => $request->quantityValue,
            'quantity_type'     => $request->quantity ?? 0,
            'price'             => $request->price ?? 0,
            'created_by'        => Auth::id(),
        ]);

        return redirect()->route('prices.index')->with('success', 'Price created successfully.');      
    }

    public function edit($id) 
    {
        if (!Gate::allows('edit prices')) {
            abort(403);
        }

        $price = PriceMaster::with('product')->where('id', $id)->first(); // Fetch the product by ID
        $product = Product::where('id', $price->product_id)->first();
        $units = json_decode($product->units, true) ?? [];

        return view('admin.prices.edit', compact('price', 'units'));
    }

    public function update(Request $request, $id)
    {
        PriceMaster::where('id', $id)->update([
            'product_id'        => $request->product,
            'quantity'          => $request->quantityValue,
            'quantity_type'     => $request->quantity ?? 0,
            'price'             => $request->price ?? 0,
            'created_by'        => Auth::id(),
        ]);

        return redirect()->route('prices.index')->with('success', 'Price Updated successfully.');
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete prices')) {
            abort(403);
        }

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
            return response()->json(['status' => 'success', 'price'=> $status, 'message' => 'Price deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Price not found.'], 404);
        }
    }
}
