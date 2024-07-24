<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::latest()->where('status', 0)->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $product = Product::orderByDesc('lot_number')->first();
        if (!$product) {
            $uniqueCode =  'PR0001';
        } else {
            $numericPart = (int)substr($product->lot_number, 3);
            $nextNumericPart = str_pad($numericPart + 1, 4, '0', STR_PAD_LEFT);
            $uniqueCode = 'PR' . $nextNumericPart;
        }

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
            'quantity'          => json_encode($request->quantities),
            'manufacture_date'  => $request->manufacture_date,
            'lot_number'        => $uniqueCode,
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

    public function show(Product $product) 
    {
        //
    }

    public function edit($id) 
    {
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
            'quantity'          => json_encode($request->quantities),
            'manufacture_date'  => $request->manufacture_date,
        ]);
        
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
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

            return response()->json(['status' => 'success', 'product' => $status, 'message' => 'Category deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Category not found.'], 404);
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
