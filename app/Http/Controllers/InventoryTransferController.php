<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\Inventory;
use App\Models\InventoryProduct;
use App\Models\PriceMaster;
use App\Models\StoreProduct;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

class InventoryTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.inventory-transfer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::latest()->get();
        return view('admin.inventory-transfer.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = json_decode($request->products_data);

        if(isset($products) && count($products) > 0){
            $store_id = $request->store;

            $inventory = Inventory::create([
                'store_id' => $store_id,
                'sent_by' => Auth::id(),
            ]);
            
            foreach($products as $product){
                $product_id = $product->id;
                
                if($product->quantity && $product->quantity > 0){
                    InventoryProduct::create([
                        'inventory_id' => $inventory->id,
                        'store_id' => $store_id,
                        'product_id' => $product_id,
                        'quantity' => $product->quantity,
                        'sent_by' => Auth::id(),
                    ]);

                    #If product and store already exists
                    $recordExist = StoreProduct::where('store_id',$store_id)->where('product_id',$product_id)->first();
                    if($recordExist){
                        $recordExist->update([
                            "quantity" => $recordExist->quantity + $product->quantity,
                        ]);

                    }else{

                        $storeProduct = StoreProduct::create([
                            "store_id" => $store_id,
                            "product_id" => $product_id,
                            "quantity" => $product->quantity,
                        ]);

                    }

                    #Price Master quantity update
                    $priceMasterUpdate = PriceMaster::where('product_id',$product_id)->first();
                    $priceMasterUpdate->update([
                        "quantity" => $priceMasterUpdate->quantity - $product->quantity,
                    ]);

                }

            }

            return redirect()->route('inventory-transfer.index')->with('success','Inventory Transfer Updated Successfully');
        } else {
            return redirect()->back()->withErrors(['error' => 'No products data provided.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventoryTransfer)
    {
        $inventoryTransfer->load('store');
        $inventoryTransfer->load('deliveredItems');
        $transferedInventory = $inventoryTransfer;
        return view('admin.inventory-transfer.view', compact('transferedInventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventoryTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventoryTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventoryTransfer)
    {
        //
    }

    public function getTransferStockInventory(Request $request)
    {
        $maxItemsPerPage = 10;
    
        // Start the query with necessary joins
        $transferQuery = Inventory::select([
                'inventories.id', 
                'inventories.store_id', 
                'inventories.vehicle_number', 
                'inventories.sent_by', 
                'inventories.created_at',
                'stores.contact_number as store_contact', 
                'stores.name as store_name',

            ])
            ->join('stores', 'inventories.store_id', '=', 'stores.id'); // Join with products table
    
        // Add search filter
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $transferQuery->where(function ($query) use ($searchValue) {
                $query->where('inventories.vehicle_number', 'like', '%' . $searchValue . '%')
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

    public function printGatePass(Request $request, $transfer_id){
        $transferedInventory = Inventory::with('store')->with('deliveredItems')->where('id',$transfer_id)->first();
       
            $pdfDirectory = 'inventory-gate-pass';
            if (!Storage::disk('public')->exists($pdfDirectory)) {                 
                Storage::disk('public')->makeDirectory($pdfDirectory);
            }
            
            // Generate PDF
            $pdf = PDF::loadView('admin.sales.sales-pdf-template.gate-pass-pdf',compact('transferedInventory'));
            $pdfContent = $pdf->output();
            $pdfFileName =  'gate-pass.pdf';
            $invoicePath = $pdfDirectory . '/' . $pdfFileName;
    
            // Save PDF to public disk
            Storage::disk('public')->put($invoicePath, $pdfContent);
    
            $publicUrl = Storage::disk('public')->url($invoicePath);
            $transferedInventory->vehicle_number = $request->vehicle_number;
            $transferedInventory->save();
            return response()->json(["gatepassPath" => $publicUrl]);

    }
}
