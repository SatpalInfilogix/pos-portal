<?php

namespace App\Http\Controllers;

use App\Models\ReturnStock;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Models\VehicleNumber;
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
        $vehicleNumbers = VehicleNumber::latest()->get();

        return view('admin.stocks.return-stock.index', compact('vehicleNumbers'));
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

                    $storeProduct = StoreProduct::where('store_id',$store_id)->where('product_id',$product_id)->first();
                    $storeProduct->update([
                        "quantity" => $storeProduct->quantity - $product->quantity
                    ]);

                    $returnStockProduct = ReturnStockProduct::create([
                        "return_stock_id" => $returnStock->id,
                        "store_id" => $store_id,
                        "product_id" => $product_id,
                        "transfer_quantity" => $product->quantity
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
                'return_stocks.status', 
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
                'return_stocks.status', 
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
    public function updateReturnInventory(Request $request, $return_id){
        //print_r($request);
        $returnInventory = ReturnStock::where('id',$return_id)->first();
        if($request->totalDelivered != $request->totalReceived){
            $returnInventory->status = 'recieved_not_all';
        }else{
            $returnInventory->status = 'received';
        }
        $returnInventory->save();

        foreach($request->productData as $productData)
        {
            $returnStockProduct =  ReturnStockProduct::where('return_stock_id',$return_id)->where('product_id',$productData['product_id'])->first();
            if($returnStockProduct->transfer_quantity != $productData['receivedQty'])
            {
                $updateQty = $returnStockProduct->transfer_quantity - $productData['receivedQty'];
                $storeProduct = StoreProduct::where('store_id',$returnInventory->store_id)->where('product_id',$productData['product_id'])->first();
                $storeProduct->update([
                    "quantity" => $storeProduct->quantity + $updateQty,
                ]);
            }
            $priceMasterUpdate = PriceMaster::where('product_id',$productData['product_id'])->first();
            if($priceMasterUpdate){
                $priceMasterUpdate->update([
                    "quantity" => $priceMasterUpdate->quantity + $productData['receivedQty'],
                ]);
            }
            $returnStockProduct->quantity = $productData['receivedQty'];
            $returnStockProduct->received_quantity = $productData['receivedQty'];
            $returnStockProduct->save();
        }
        return response()->json(['success' => true]);
    }
    public function viewReturnGatePass($return_id){
     
        $returStocks = ReturnStock::with('store')->with('deliveredItems')->where('id',$return_id)->first();
        //dd($returStocks);
       // $transferedInventory = Inventory::with('store')->with('deliveredItems')->where('id',$transfer_id)->first();
       // dd($transferedInventory);
       return view('admin.stocks.return-stock.pdf.return-gate-pass',compact('returStocks'));
    }
    public function updateGatePassStatus(Request $request, $return_id){
        
        $returnInventory = ReturnStock::where('id',$return_id)->first();
        $returnInventory->vehicle_number = $request->vehicle_number;
        $returnInventory->save();
        return response()->json(["success" => true]);

    }
}
