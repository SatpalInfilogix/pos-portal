<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Discount;

class AdminDiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::with('product')->latest()->get();

        return view('admin.discount.index', compact('discounts'));
    }

    public function create()
    {
        return view('admin.discount.create');
    }

    public function store(Request $request)
    {
        Discount::create([
            'discount'          => $request->discount,
            'quantity'          => $request->quantity,
            'created_by'        => Auth::id(),
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    public function edit($id) 
    {
        $discount = Discount::with('product')->where('id', $id)->first(); // Fetch the product by ID

        return view('admin.discount.edit', compact('discount'));
    }

    public function update(Request $request,$id)
    {
        Discount::where('id', $id)->update([
            'quantity'          => $request->quantity,
            'discount'          => $request->discount,
        ]);

        return redirect()->route('discounts.index')->with('success', 'Discount Updated successfully.');
        
    }

    public function destroy($id)
    {
        $discountData = Discount::where('id', $id)->first();

        if ($discountData) {
            if($discountData->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }

            $discountData->update([
                'status' => $status
            ]);
            return response()->json(['status' => 'success', 'discount' => $status, 'message' => 'Category deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Category not found.'], 404);
        }
    }
}
