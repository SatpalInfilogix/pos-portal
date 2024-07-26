<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        /* $customerUniqueNumber = Customer::orderByDesc('customer_id')->first();
        if (!$customerUniqueNumber) {
            $cusId =  'CUS0001';
        } else {
            $numericPart = (int)substr($customerUniqueNumber->customer_id, 3);
            $nextNumericPart = str_pad($numericPart + 1, 4, '0', STR_PAD_LEFT);
            $cusId = 'CUS' . $nextNumericPart;
        } */


        Customer::create([
            'customer_name'     => $request->name,
            'contact_number'    => $request->phone_number,
            'alternate_number'  => $request->alternate_number,
            'shipping_address'  => $request->shipping_address,
            'billing_address'   => $request->billing_address ?? $request->shipping_address,
            'shipping_address_pin_code'   => $request->shipping_address_pin_code,
            'billing_address_pin_code'   => $request->billing_address_pin_code ?? $request->shipping_address_pin_code,
            'created_by'   => Auth::id(),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::where('id', $id)->first();
        $customer->update([
            'customer_name'     => $request->name,
            'contact_number'    => $request->phone_number,
            'alternate_number'  => $request->alternate_number,
            'shipping_address'  => $request->shipping_address,
            'billing_address'   => $request->billing_address ?? $request->shipping_address,
            'shipping_address_pin_code'   => $request->shipping_address_pin_code,
            'billing_address_pin_code'   => $request->billing_address_pin_code ?? $request->shipping_address_pin_code,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        $customer = Customer::where('id', $id)->first();
        if ($customer) {
            if($customer->status == 1) {
                $status = 0;
            } else {
                $status = 1;
            }
            $customer->update([
                'status' => $status
            ]);

            return response()->json(['status' => 'success', 'customerStatus' => $status, 'message' => 'Customer deleted successfully.'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Customer not found.'], 404);
        }
    }
}
