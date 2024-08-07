<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\Product;
use App\Models\Discount;
use Illuminate\Support\Facades\Gate;

class AdminDiscountController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view discounts')) {
            abort(403);
        }

        $discounts = Discount::with('product')->where('role_id', '!=', 1)->latest()->get();
        foreach($discounts as $key => $discount)
        {
            $roles = Role::where('id', $discount->role_id)->first();
            $discounts[$key]['roleName'] =  $roles->name;
        }

        return view('admin.discount.index', compact('discounts'));
    }

    public function create()
    {
        if (!Gate::allows('create discounts')) {
            abort(403);
        }

        $roles = Role::where('name', '!=', 'Super Admin')->latest()->get();
        foreach($roles as $key => $role) {
            $discount = Discount::where('role_id', $role->id)->first();
            $roles[$key]['discount'] = $discount->discount ?? ' ';
        }
        return view('admin.discount.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $roles = $request->input('role');
        $discounts = $request->input('discount');
        
        foreach ($roles as $index => $role) {
            $discount = isset($discounts[$index]) ? $discounts[$index] : null;
            
            $existingDiscount = Discount::where('role_id', $role)->first();
            if ($existingDiscount) {
                $existingDiscount->update([
                    'discount' => $discount,
                ]);
            } else {
                Discount::create([
                    'role_id' => $role,
                    'discount' => $discount,
                    'created_by' => Auth::id(),
                ]);
            }
        }

        // Save upto 100% discount for super admin if not existing
        $existingDiscount = Discount::where('role_id', 1)->first();
        if(!$existingDiscount){
            Discount::create([
                'role_id' => 1,
                'discount' => 100,
                'created_by' => Auth::id(),
            ]);
        }

        return redirect()->route('discounts.index')->with('success', 'Discount created successfully.');
    }

    public function edit($id) 
    {
        if (!Gate::allows('edit discounts')) {
            abort(403);
        }

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
        if (!Gate::allows('delete discounts')) {
            abort(403);
        }

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
            return response()->json(['status' => 'success', 'discount' => $status, 'message' => 'Discount deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Discount not found.'], 404);
        }
    }
}
