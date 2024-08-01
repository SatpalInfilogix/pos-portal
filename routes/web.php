<?php 
/* Functionality Imports Starts Here */
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/* Functionality Imports Starts Here */

/* Controller Imports Starts Here */
/* Backend Controller Import */
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminPriceController;
use App\Http\Controllers\AdminDiscountController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminRoleAndPermissionController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\PosGatePassController;
use App\Http\Controllers\AdminSalesController;
use App\Http\Controllers\InventoryTransferController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReturnStockController;
use App\Http\Controllers\InventoryReturnController;
/* End Backend Controller Import */

/* Frontend Controller Import */
use App\Http\Controllers\PosDashboardController;
use App\Http\Controllers\PosCartController;
/* End Frontend Controller Import */
/* Controller Imports ends Here */

/* Root Routes Call Starts Here*/
Route::get('/', function () {
    return redirect()->route('login');
});
/* Login And Registration Routes Starts Here */

// Login Blade Call Route
Route::get('/login', function(){
    return view('login.login');
})->name('login');

//Check login credentials and allow user to the POS
Route::post('/check-login', [LoginController::class,'checkLogin'])->name('check-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Routes that require authentication
Route::middleware(['auth', 'auth.session'])->group(function () {
    //Backend dashboard Access.
    /***************** Backend routes ****************/
    Route::get('/admin-dashboard',[AdminDashboardController::class,'showAdminDashboard'])->name('backend-dashboard');

    Route::prefix('admin')->group(function () {
        Route::resources([
            '/admin-dashboard/profile' => DashboardSettingController::class,
            'profile'     => DashboardSettingController::class,
            'roles-and-permissions' => AdminRoleAndPermissionController::class,
            'inventory-transfer' => InventoryTransferController::class,
            'stores' => StoreController::class,
            'return-stock' => ReturnStockController::class,
        ]);
        /********************** Sales Routes Start Here  **********************/
        Route::get('/sales',[AdminSalesController::class,'index'])->name('sales.index');
        Route::get('/sales/{id}',[AdminSalesController::class,'show'])->name('sales.view');

        /********************** Sales Routes Ends Here  **********************/
         
         Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
         Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
         Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
         Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
         Route::post('/categories/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
         Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');
         /********************** End Categories Routes  **********************/

          /********************** Products Routes  **********************/
          Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
          Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
          Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
          Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
          Route::post('/products/{id}', [AdminProductController::class, 'update'])->name('products.update');
          Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->name('products.destroy');
          /********************** End Products Routes  **********************/

          /********************** Prices Routes  **********************/
          Route::get('/prices', [AdminPriceController::class, 'index'])->name('prices.index');
          Route::get('/prices/create', [AdminPriceController::class, 'create'])->name('prices.create');
          Route::post('/prices', [AdminPriceController::class, 'store'])->name('prices.store');
          Route::get('/prices/{id}/edit', [AdminPriceController::class, 'edit'])->name('prices.edit');
          Route::post('/prices/{id}', [AdminPriceController::class, 'update'])->name('prices.update');
          Route::delete('/prices/{id}', [AdminPriceController::class, 'destroy'])->name('prices.destroy');
          /********************** End Prices Routes  **********************/

          /********************** Discounts Routes  **********************/
          Route::get('/discounts', [AdminDiscountController::class, 'index'])->name('discounts.index');
          Route::get('/discounts/create', [AdminDiscountController::class, 'create'])->name('discounts.create');
          Route::post('/discounts', [AdminDiscountController::class, 'store'])->name('discounts.store');
          Route::get('/discounts/{id}/edit', [AdminDiscountController::class, 'edit'])->name('discounts.edit');
          Route::post('/discounts/{id}', [AdminDiscountController::class, 'update'])->name('discounts.update');
          Route::delete('/discounts/{id}', [AdminDiscountController::class, 'destroy'])->name('discounts.destroy');
          /********************** End Discounts Routes  **********************/

        /********************** Users Routes  **********************/
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::post('/users/{id}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');
        /********************** End Users Routes  **********************/

        /********************** Admin Customers Routes  **********************/
        Route::get('/customers', [AdminCustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/create', [AdminCustomerController::class, 'create'])->name('customers.create');
        Route::post('/customers', [AdminCustomerController::class, 'store'])->name('customers.store');
        Route::get('/customers/{id}/edit', [AdminCustomerController::class, 'edit'])->name('customers.edit');
        Route::post('/customers/{id}', [AdminCustomerController::class, 'update'])->name('customers.update');
        Route::delete('/customers/{id}', [AdminCustomerController::class, 'destroy'])->name('customers.destroy');
        /********************** End Customers Routes  **********************/

        /********************** Invoice Routes  **********************/
        Route::post('/pos-sale-submission', [OrderController::class, 'POSSaleSubmission'])->name('sale.submission');
        Route::get('/pos-hold-order', [OrderController::class, 'posHoldOrder'])->name('hold.order');
        Route::get('/search-invoice/{invoice_id}', [OrderController::class, 'searchInvoice'])->name('search.invoice');
        Route::get('/view-invoice/{invoice_id}', [OrderController::class, 'viewInvoice'])->name('view.invoice');
        Route::get('/print-gatepass/{invoice_id}', [PosGatePassController::class, 'printGatePass'])->name('print.gatepass');
        /********************** Invoice Routes End**********************/
    });

    //sales receipt
    Route::view('cash-sales-receipt-pdf','admin.sales.sales-pdf-template.cash-sales-receipt-pdf');
    Route::view('card-sales-receipt-pdf','admin.sales.sales-pdf-template.card-sales-receipt-pdf');
    Route::view('gift-card-sales-receipt-pdf','admin.sales.sales-pdf-template.gift-card-sales-receipt-pdf');
    Route::view('credit-customer-sales-receipt-pdf','admin.sales.sales-pdf-template.credit-customer-sales-receipt-pdf');
    Route::view('gate-pass-pdf','admin.sales.sales-pdf-template.gate-pass-pdf');
    Route::view('stock-transfer-pdf','admin.stocks.stock-transfer-pdf-template.stock-transfer-pdf');
    
    Route::get('/pos-dashboard',[PosDashboardController::class,'index'])->name('pos-dashboard');
});
/***************  Frontend Routes ****************/
Route::get('/search-products', [AdminProductController::class,'searchProducts'])->name('search-products');
Route::post('/import-products', [AdminProductController::class, 'import_products'])->name('import-products');
Route::post('add-to-cart', [PosCartController::class, 'addToCart'])->name('add-to-cart');
Route::post('remove-from-cart', [PosCartController::class, 'remove'])->name('remove-from-cart');
Route::post('update-cart', [PosCartController::class, 'update'])->name('update-cart');
Route::post('discount', [PosCartController::class, 'discountApply'])->name('discount');
Route::post('clear-cart', [PosCartController::class, 'clearCart'])->name('clear-cart');

/************************* DataTables Routes ************************/
Route::post('/get-users', [AdminUserController::class, 'getUsers'])->name('get-users');
Route::post('/get-categories', [AdminCategoryController::class, 'getCategories'])->name('get-categories');
Route::post('/get-products', [AdminProductController::class, 'getProducts'])->name('get-products');
Route::post('/get-prices', [AdminPriceController::class, 'getPrices'])->name('get-prices');
Route::post('/get-customers', [AdminCustomerController::class, 'getCustomers'])->name('get-customers');
Route::post('/get-sales', [AdminSalesController::class, 'getSalesOrder'])->name('get-sales');
Route::post('/get-transfer-stock-inventory', [InventoryTransferController::class, 'getTransferStockInventory'])->name('get-transfer-stock-inventory');
Route::post('/get-return-stock-inventory', [ReturnStockController::class, 'getReturnStockInventory'])->name('get-return-stock-inventory');
/************************* End DataTables Routes ************************/

Route::post('/products/check-product-code', [AdminProductController::class, 'checkProductCode'])->name('products.check_code');


/* Login And Registration Routes Ends Here */
Route::get('/generate-pdf', [PDFController::class, 'download'])->name('download');
/* Api product quantity */ 
Route::post('/products-quantity',[InventoryReturnController::class, 'availableProductQuantity'])->name('check-products-quantity');
/*  product units  */
Route::get('/product-units/{productId}', [AdminPriceController::class, 'getUnits']);