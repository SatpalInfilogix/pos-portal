<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;
use Illuminate\Support\facades\Auth;

class DiscountController extends Controller
{
    public function getDiscount()
    {
        $roleId = Auth::user()->roles->first()->id;

        $discount = Discount::where('role_id', $roleId)->first();

        return response()->json([
            'success' => true,
            'message' => 'Discount',
            'data'    => $discount
        ]);
    }
}
