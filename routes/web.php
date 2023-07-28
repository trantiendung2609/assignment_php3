<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ShopController;

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
Route::get('/admin', [AdminController::class, 'admin']);
Route::resource('/brand', BrandController::class);
Route::resource('/product', ProductController::class);
Route::resource('/category', CategoryController::class);
Route::resource('signin', SignController::class);
Route::resource('/size', SizeController::class);
Route::resource('/shop', ShopController::class);
