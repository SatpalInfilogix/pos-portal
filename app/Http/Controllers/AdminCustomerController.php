<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminCustomerController extends Controller
{
    public function index()
    {
        if (!Gate::allows('view customers')) {
            abort(403);
        }

        $customers = Customer::latest()->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        if (!Gate::allows('create customers')) {
            abort(403);
        }

        $stores = Store::where('is_deleted',0)->get();
        return view('admin.customers.create',compact('stores'));
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
            'customer_email'    => $request->email,
            'alternate_number'  => $request->alternate_number,
            'billing_address'   => $request->billing_address,
            'shipping_address_pin_code'   => $request->shipping_address_pin_code,
            'billing_address_pin_code'   => $request->billing_address_pin_code ?? $request->shipping_address_pin_code,
            'created_by'   => Auth::id(),
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function getCustomers(Request $request)
    {
        $maxItemsPerPage = 10;

        // Base query
        $customersQuery = Customer::select(['id', 'customer_name', 'contact_number']);

        // Search filter
        if ($request->has('search') && !empty($request->search['value'])) {
            $searchValue = $request->search['value'];
            $customersQuery->where('customer_name', 'like', '%' . $searchValue . '%')
                            ->orWhere('contact_number', 'like', '%' . $searchValue . '%');
        }

        // Sorting
        if ($request->has('order')) {
            $orderColumnIndex = $request->order[0]['column'];
            $orderDirection = $request->order[0]['dir'];
            $column = $request->columns[$orderColumnIndex]['data'];

            // Sort by valid columns only
            $validColumns = ['id', 'customer_name', 'contact_number']; // Define valid columns
            if (in_array($column, $validColumns)) {
                $customersQuery->orderBy($column, $orderDirection);
            }
        }

        // Pagination
        $totalRecords = $customersQuery->count();
        $perPage = $request->input('length', $maxItemsPerPage);
        $currentPage = (int) ($request->input('start', 0) / $perPage);
        $customers = $customersQuery->skip($currentPage * $perPage)->take($perPage)->get();


        // Respond with data
        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords, // Adjust if filtered records are different
            "data" => $customers
        ]);
    }

    public function edit($id)
    {
        if (!Gate::allows('edit customers')) {
            abort(403);
        }

        $customer = Customer::where('id', $id)->first();
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::where('id', $id)->first();
        $customer->update([
            'customer_name'     => $request->name,
            'customer_email'     => $request->email,
            'contact_number'    => $request->phone_number,
            'alternate_number'  => $request->alternate_number,
            'billing_address'   => $request->billing_address,
            'shipping_address_pin_code'   => $request->shipping_address_pin_code,
            'billing_address_pin_code'   => $request->billing_address_pin_code ?? $request->shipping_address_pin_code,
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        if (!Gate::allows('delete customers')) {
            abort(403);
        }

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
