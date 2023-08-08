<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('product-detail/{id}', [HomeController::class, 'DetailProduct'])->name('DetailProduct');
Route::get('/search_item', [HomeController::class, 'search_item'])->name('search_item');

Route::resource('/shop', ShopController::class);
// set middleware cho 1 route cho admin

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    //tất cả các route nào muốn được bảo vệ thì sẽ vứt trong này
    Route::get('/home_admin', [AdminController::class, 'admin']);
    // Route::resource('/admin', AdminController::class);
    Route::resource('/brand', BrandController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/size', SizeController::class);
    Route::resource('/user', UserController::class);
    Route::get('manage-order', [CheckoutController::class, 'manage_order']);
    Route::get('/view-order/{id}', [CheckoutController::class, 'view_order']);
    Route::delete('/delete-order/{id}', [CheckoutController::class, 'delete_order'])->name('route_delete');
    Route::get('/insert-coupon', [CouponController::class, 'insert_coupon']);
    Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
    Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code']);
    Route::get('/delete-coupon/{id}', [CouponController::class, 'delete_coupon']);
});
// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// cart 
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::post('/update-cart-qty', [CartController::class, 'update_cart_qty']);
Route::post('/save-cart', [CartController::class, 'save_cart']);
//checkout 
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::post('/vnpay', [CheckoutController::class, 'vnpayment']);
Route::get('/handcash', [CheckoutController::class, 'hand_cash']);
//coupon
Route::post('/check-coupon', [CartController::class, 'check_coupon']);

require __DIR__ . '/auth.php';
