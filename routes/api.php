<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('get-profile', [ProfileController::class, 'getProfile']);
    Route::post('update-profile', [ProfileController::class, 'update']);

    Route::get('get-category', [CategoryController::class, 'getCategory']);
    Route::post('get-category-products', [CategoryController::class, 'getCategoryProducts']);

    Route::get('get-products', [ProductController::class, 'getProducts']);

    Route::get('get-orders', [OrderController::class, 'getOrders']);
    Route::post('place-order', [OrderController::class, 'placeOrder']);
});
Route::post('add-to-cart', [CartController::class, 'addToCart']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
