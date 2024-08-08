<?php

namespace App\Http\Controllers;

use App\Models\ReturnStock;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

use App\Models\ReturnStockProduct;
use App\Models\PriceMaster;
use App\Models\StoreProduct;
use Illuminate\Support\Facades\Gate;

class ReturnStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('view return stocks')) {
            abort(403);
        }

        return view('admin.stocks.return-stock.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('create return stocks')) {
            abort(403);
        }

        $stores = Store::latest()->get();
        return view('admin.stocks.return-stock.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = json_decode($request->products_data);
 
        if(isset($products) && count($products) > 0){
            $store_id = Auth::user()->store_id;
            $returnStock = ReturnStock::create([
                'store_id' => $store_id,
                'returned_by' => Auth::id(),
            ]);

            foreach($products as $product){
                $product_id = $product->id;
                
                if($product->quantity && $product->quantity > 0){
                    $priceMaster = PriceMaster::where('product_id',$product_id)->first();

                    $priceMaster->update([
                        "quantity" => $priceMaster->quantity + $product->quantity
                    ]);

                    $storeProduct = StoreProduct::where('store_id',$store_id)->where('product_id',$product_id)->first();
                    $storeProduct->update([
                        "quantity" => $storeProduct->quantity - $product->quantity
                    ]);

                    $returnStockProduct = ReturnStockProduct::create([
                        "return_stock_id" => $returnStock->id,
                        "store_id" => $store_id,
                        "product_id" => $product_id,
                        "quantity" => $product->quantity
                    ]);

                }

            }

            return redirect()->route('return-stock.index')->with('success','Return Stock Updated Successfully');

        } else {

            return redirect()->back()->withErrors(['error' => 'No products data provided.']);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ReturnStock $returnStock)
    {
        $returnStock->load('store');
        $returnStock->load('deliveredItems');
        $returnStockInventory = $returnStock;
        return view('admin.stocks.return-stock.view', compact('returnStockInventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReturnStock $returnStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReturnStock $returnStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReturnStock $returnStock)
    {
        //
    }
    public function getReturnStockInventory(Request $request)
    {
        $maxItemsPerPage = 10;
        $store_id = Auth::user()->store_id;
        // Start the query with necessary joins
        if(isset($store_id)){
            $transferQuery = ReturnStock::select([
                'return_stocks.id', 
                'return_stocks.store_id', 
                'return_stocks.vehicle_number', 
                'return_stocks.returned_by', 
                'return_stocks.created_at',
                'stores.contact_number as store_contact', 
                'stores.name as store_name',

            ])
            ->join('stores', 'return_stocks.store_id', '=', 'stores.id')
            ->where('store_id',$store_id); // Join with products table
        }else{
            $transferQuery = ReturnStock::select([
                'return_stocks.id', 
                'return_stocks.store_id', 
                'return_stocks.vehicle_number', 
                'return_stocks.returned_by', 
                'return_stocks.created_at',
                'stores.contact_number as store_contact', 
                'stores.name as store_name',

            ])
            ->join('stores', 'return_stocks.store_id', '=', 'stores.id');
        }

    
        // Add search filter
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $transferQuery->where(function ($query) use ($searchValue) {
                $query->where('return_stocks.vehicle_number', 'like', '%' . $searchValue . '%')
                    ->orWhere('stores.name', 'like', '%' . $searchValue . '%');
            });
        }
    
        // Add sorting
        if ($request->has('order')) {
            $orderColumn = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumn]['data'];
            $transferQuery->orderBy($column, $orderDirection);
        }
    
        // Count total records
        $totalRecords = $transferQuery->count();
    
        // Pagination
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = $request->input('start', 0) / $perPage;
        $returnTransfers = $transferQuery->skip($currentPage * $perPage)->take($perPage)->get();

        // Return JSON response
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $returnTransfers
        ]);
    }
}
