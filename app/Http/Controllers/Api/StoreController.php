<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function getStore()
    {
        $stores = Store::where('is_deleted',0)->get();

        return response()->json([
            'success'  => true,
            'message'  => 'Store Listing',
            'data'     => $stores
        ]);
    }
}
