<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Facades\Gate;
use Picqer\Barcode\BarcodeGeneratorPNG;
use PDF;

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
    
        if (isset($store_id)) {
            $productsQuery = Product::where('is_active', 0)->select([
                'products.id',
                'products.name',
                'products.image',
                'products.status',
                'products.product_code',
                DB::raw('COALESCE(MAX(store_products.quantity), 0) as available_quantity'),
                'categories.name as category_name', 'price_masters.manufacture_date'
            ])
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('store_products', function($join) use ($store_id) {
                $join->on('products.id', '=', 'store_products.product_id')
                     ->where('store_products.store_id', '=', $store_id);
            })
            ->leftJoin('price_masters', 'products.id', '=', 'price_masters.product_id')
            ->where('categories.status', '=', 0)
            ->groupBy([
                'products.id', 'products.name', 'products.image', 'products.status', 'products.product_code', 'categories.name', 'price_masters.manufacture_date'
            ]);
    
            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $productsQuery->where(function ($query) use ($searchValue) {
                    $query->where('products.name', 'like', '%' . $searchValue . '%')
                        ->orWhere('price_masters.manufacture_date', 'like', '%' . $searchValue . '%')
                        ->orWhere('categories.name', 'like', '%' . $searchValue . '%')
                        ->orWhere(DB::raw('COALESCE(store_products.quantity, 0)'), 'like', '%' . $searchValue . '%');
                });
            }
        } else {
            $productsQuery = Product::select([
                'products.id',
                'products.name',
                'products.image',
                'products.status',
                'products.product_code',
                'products.is_active',
                DB::raw('MAX(price_masters.quantity) as available_quantity'),
                'categories.name as category_name',
                'price_masters.manufacture_date'
            ])
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('price_masters', 'products.id', '=', 'price_masters.product_id')
            ->where('categories.status', '=', 0)
            ->groupBy([
                'products.id', 'products.name', 'price_masters.manufacture_date', 'products.image', 'products.status', 'products.product_code', 'products.is_active', 'categories.name'
            ]);

            if ($request->has('search') && !empty($request->search['value'])) {
                $searchValue = $request->search['value'];
                $productsQuery->where(function ($query) use ($searchValue) {
                    $query->where('products.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('price_masters.manufacture_date', 'like', '%' . $searchValue . '%')
                        ->orWhere('categories.name', 'like', '%' . $searchValue . '%')
                        ->orWhere(DB::raw('COALESCE(price_masters.quantity, 0)'), 'like', '%' . $searchValue . '%');
                });
            }
        }

        if($request->is_active == 'true') {
            $productsQuery->where('products.is_active', 0);  
        }
    
        if ($request->is_deleted == 'false') {
            $productsQuery->where('products.status', 0);
        }
    
        if ($request->has('order')) {
            $orderColumnIndex = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumnIndex]['data'];
    
            $validColumns = ['id', 'name', 'manufacture_date', 'image', 'status', 'is_active', 'category_name', 'available_quantity'];
            if (in_array($column, $validColumns)) {
                if ($column === 'category_name') {
                    $productsQuery->orderBy('categories.name', $orderDirection);
                } elseif ($column === 'available_quantity') {
                    $productsQuery->orderBy(DB::raw('COALESCE(store_products.quantity, price_masters.quantity)'), $orderDirection);
                } else {
                    $productsQuery->orderBy('products.' . $column, $orderDirection);
                }
            }
        }

        // Total records
        $totalRecords = count(json_decode($productsQuery->get()));

        // Pagination
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = max((int) ($request->input('start', 0) / $perPage), 0);
        $products = $productsQuery->skip($currentPage * $perPage)->take($perPage)->get();
        
        // Debugging: Log SQL query and bindings
        // Log::info($productsQuery->toSql());
        // Log::info($productsQuery->getBindings());
    
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords, // You might want to adjust this if filters are applied
            "data" => $products
        ]);
    }

    public function create()
    {
        if (!Gate::allows('create product')) {
            abort(403);
        }

        $units = Unit::latest()->where('status', 0)->get();
        $categories = Category::latest()->where('status', 0)->get();

        return view('admin.products.create', compact('categories', 'units'));
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'category_id' => 'required',
        //     'product_name' => 'required',
        // ]);

        // $category = Category::find($request->category_id);
        // $categoryInitials = str_replace(' ', '-', $category->name);
        // $productName = str_replace(' ', '-',$request->product_name);
        // $latestProduct = Product::latest('id')->first();
        // $latestCodeNumber = $latestProduct ? (int) substr($latestProduct->product_code, -6) : 0;
        // $newCodeNumber = str_pad($latestCodeNumber + 1, 6, '0', STR_PAD_LEFT);

        // $productCode = "{$categoryInitials}-{$productName}-{$newCodeNumber}";

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
            // 'units'              => json_encode($request->units),
            'units'             => $request->units,
            'created_by'        => Auth::id(),
            'image'             => 'uploads/products/'. $filename,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function import_products(Request $request){
        // $request->validate([
        //     'file' => 'required|mimes:csv,xlsx',
        // ]);

        $excel =  Excel::import(new ProductsImport, $request->file('file'));
        return redirect()->route('products.index')->with('success', 'Products imported successfully.');
    }

    public function searchProducts(Request $request)
    {
        $searchTerm = $request->input('input');
        $products = Product::where('status', 0)->where('name', 'like', '%' . $searchTerm . '%')
                            ->whereHas('category', function ($query) {
                                $query->where('status', 0); // Ensure that the category status is 0
                            })->get(['id', 'name']);

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

        $units = Unit::latest()->where('status', 0)->get();
        $categories  = Category::where('status', 0)->latest()->get();
        $product = Product::where('id', $id)->first(); // Fetch the product by ID
        return view('admin.products.edit', compact('product', 'categories', 'units'));
    }

    public function update(Request $request, $id)
    {

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/'), $filename);
        }

        $product_data = Product::where('id', $id)->select('image')->first();

        $oldImage = $product_data->image;

        $product = Product::where('id', $id)->update([
            'category_id'       => $request->category_id,
            'name'              => $request->product_name,
            'product_code'      => $request->product_code,
            'units'             => $request->units,
            // 'units'              => empty($request->units) ? null : json_encode($request->units),
            'image'             => !empty($filename) ? 'uploads/products/'. $filename : $oldImage,
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

    public function status($id)
    {
        $product = Product::where('id',$id)->first();

        if ($product) {
            if($product->is_active == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
            // $category->status = 1; // Assuming this marks the category as "deleted"
            $product->update([
                'is_active' => $status
            ]);

            return response()->json(['status' => 'success', 'product' => $status, 'message' => 'Product status changed successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'Product' => 'Category not found.'], 404);
        }
    }

    public function downloadSampleCsv()
    {
        $filePath = public_path('sample-products.csv');
        return response()->download($filePath);
    }

    public function getLatestCodeNumber()
    {
        $latestProduct = Product::latest('id')->first();
        $latestCodeNumber = $latestProduct ? substr($latestProduct->product_code, -6) : 0;
        return response()->json(['latest_code_number' => $latestCodeNumber]);
    }

    public function downloadBarcodes()
    {
        $products = Product::where('status', 0)
                            ->whereHas('category', function ($query) {
                                $query->where('status', 0);
                            })->get();

        $generator = new BarcodeGeneratorPNG();
        $barcodes = [];

        foreach ($products as $product) {
            $barcode = base64_encode($generator->getBarcode($product->product_code, $generator::TYPE_CODE_128));
            $barcodes[] = [
                'product' => $product,
                'barcode' => $barcode,
                'product_code' => $product->product_code
            ];
        }

        $pdf = PDF::loadView('admin.products.pdf.barcodes', ['barcodes' => $barcodes]);

        return $pdf->download('product_barcodes.pdf');
    }
}
