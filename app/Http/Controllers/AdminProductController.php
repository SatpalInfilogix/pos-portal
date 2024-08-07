<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Imports\ProductsImport;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Facades\Gate;

class AdminProductController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view product')) {
            abort(403);
        }

        $products = Product::with('category')->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function getProducts(Request $request)
    {
        $maxItemsPerPage = 10;
        $store_id = Auth::user()->store_id;
        if(isset($store_id)){
            $productsQuery = Product::select(['products.id', 'products.name', 'products.manufacture_date', 'products.image', 'products.status', 'products.product_code',
                DB::raw('COALESCE(MAX(store_products.quantity), 0) as available_quantity'), // Aggregate to handle multiple store_products entries
                'categories.name as category_name'
            ])
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('store_products', function($join) use ($store_id) {
                $join->on('products.id', '=', 'store_products.product_id')
                     ->where('store_products.store_id', '=', $store_id);
            })
            ->leftJoin('price_masters', 'products.id', '=', 'price_masters.product_id')
            ->groupBy([
                'products.id', 'products.name', 'products.manufacture_date', 'products.image', 'products.status', 'products.product_code', 'categories.name'
            ]);

                    // Apply search filter
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $productsQuery->where(function ($query) use ($searchValue) {
                    $query->where('products.name', 'like', '%' . $searchValue . '%')
                        ->orWhere('products.manufacture_date', 'like', '%' . $searchValue . '%')
                        ->orWhere('categories.name', 'like', '%' . $searchValue . '%')
                        ->orWhere('store_products.quantity', 'like', '%' . $searchValue . '%');
                });
            }
        }else{
            // $productsQuery = Product::select(['products.id', 'products.name', 'products.manufacture_date', 'products.image', 'products.status', 'products.product_code', 'price_masters.quantity as available_quantity', 'categories.name as category_name'])
            // ->join('categories', 'products.category_id', '=', 'categories.id')
            // ->join('price_masters', 'products.id', '=', 'price_masters.product_id');

            $productsQuery = Product::select([
                'products.id',  'products.name',  'products.manufacture_date', 'products.image', 'products.status', 'products.product_code', 
                DB::raw('MAX(price_masters.quantity) as available_quantity'), // Aggregate to get the maximum quantity
                'categories.name as category_name'
            ])
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('price_masters', 'products.id', '=', 'price_masters.product_id')
            ->groupBy([ 'products.id',  'products.name',  'products.manufacture_date', 'products.image', 'products.status',  'products.product_code', 'categories.name'
            ]);

            // Apply search filter
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $productsQuery->where(function ($query) use ($searchValue) {
                    $query->where('products.name', 'like', '%' . $searchValue . '%')
                        ->orWhere('products.manufacture_date', 'like', '%' . $searchValue . '%')
                        ->orWhere('categories.name', 'like', '%' . $searchValue . '%')
                        ->orWhere('price_masters.quantity', 'like', '%' . $searchValue . '%');
                });
            }
        }
 
        if($request->is_deleted=='false'){
            $productsQuery->where('products.status', 0);
        }

        if ($request->has('order')) {
            $orderColumnIndex = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumnIndex]['data'];

            $validColumns = ['id', 'name', 'manufacture_date', 'image', 'status', 'category_name', 'available_quantity'];
            if (in_array($column, $validColumns)) {
                if ($column === 'category_name') {
                    $productsQuery->orderBy('categories.name', $orderDirection);
                } elseif ($column === 'available_quantity') {
                    $productsQuery->orderBy('price_masters.quantity', $orderDirection);
                } else {
                    $productsQuery->orderBy('products.' . $column, $orderDirection);
                }
            }
        }

        $totalRecords = $productsQuery->count();
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = max((int) ($request->input('start', 0) / $perPage), 0);
        $products = $productsQuery->skip($currentPage * $perPage)->take($perPage)->get();

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $products
        ]);
    }

    public function create()
    {
        if (!Gate::allows('create product')) {
            abort(403);
        }

        $categories = Category::latest()->where('status', 0)->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/'), $filename);
        }

        Product::create([
            'category_id'       => $request->category_id,
            'name'              => $request->product_name,
            'product_code'      => $request->product_code,
            'units'              => json_encode($request->units),
            'manufacture_date'  => $request->manufacture_date,
            'created_by'        => Auth::id(),
            'image'             => 'uploads/products/'. $filename,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function import_products(Request $request){
        $request->validate([
            'file' => 'required|mimes:csv,xlsx',
        ]);

        Excel::import(new ProductsImport, $request->file('file'));
        
        return redirect()->route('products.index')->with('success', 'Products imported successfully.');
    }

    
    public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('input');
        $products = Product::where('status', 0)->where('name', 'like', '%' . $searchTerm . '%')->get(['id', 'name']);

        foreach($products as $key => $product){
            $products[$key]['units'] = json_decode($product->units, true) ?: [];
        }

        return response()->json($products);
    }

    public function show(Product $product) 
    {
        //
    }

    public function edit($id) 
    {
        if (!Gate::allows('edit product')) {
            abort(403);
        }

        $categories  = Category::where('status', 0)->latest()->get();
        $product = Product::where('id', $id)->first(); // Fetch the product by ID

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->update([
            'category_id'       => $request->category_id,
            'name'              => $request->product_name,
            'product_code'      => $request->product_code,
            'units'              => json_encode($request->units),
            'manufacture_date'  => $request->manufacture_date,
        ]);
        
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete product')) {
            abort(403);
        }

        $product = Product::where('id',$id)->first();

        if ($product) {
            if($product->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
            // $category->status = 1; // Assuming this marks the category as "deleted"
            $product->update([
                'status' => $status
            ]);

            return response()->json(['status' => 'success', 'product' => $status, 'message' => 'Product deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'Product' => 'Category not found.'], 404);
        }
    }

    public function checkProductCode(Request $request){
        if(isset($request->type)){
            $product = Product::where('product_code', $request->product_code)->where('id','!=',$request->product_id)->first();
            if($product){
                return response()->json(["success" => true]);
            }else{
                return response()->json(["error" => true]);
            }
        }else{
            $product = Product::where('product_code', $request->product_code)->first();
            if($product){
                return response()->json(["success" => true]);
            }else{
                return response()->json(["error" => true]);
            }
        }
    }
}
