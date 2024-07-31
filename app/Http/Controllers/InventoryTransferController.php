<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryProduct;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                }
            }

            die('inventory transfered');
        } else {
            return redirect()->back()->withErrors(['error' => 'No products data provided.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventoryTransfer)
    {
        //
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
}
