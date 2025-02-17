<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PosDashboardController;
use App\Http\Controllers\Api\InventoryReturnController;
use App\Http\Controllers\Api\PosCartController;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pos-dashboard', [PosDashboardController::class, 'index'])->name('pos-dashboard');
    Route::post('/get-transaction', [PosDashboardController::class, 'getTransaction'])->name('get-transaction');
    
    Route::post('/products-quantity',[InventoryReturnController::class, 'availableProductQuantity'])->name('check-products-quantity');

    Route::post('add-to-cart', [PosCartController::class, 'addToCart'])->name('add-to-cart');
    Route::post('remove-from-cart', [PosCartController::class, 'remove'])->name('remove-from-cart');
    Route::post('update-cart', [PosCartController::class, 'update'])->name('update-cart');
    Route::post('discount', [PosCartController::class, 'discountApply'])->name('discount');
    Route::post('clear-cart', [PosCartController::class, 'clearCart'])->name('clear-cart');
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
