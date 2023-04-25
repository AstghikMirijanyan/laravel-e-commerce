<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductReviewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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
Auth::routes();
Route::get('/', [ProductsController::class, 'index']);
Route::get('/product/{id}', [ProductsController::class, 'getProductById']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/orders', [OrdersController::class, 'index']);

Route::post('reviews', [ProductReviewsController::class, 'insertProductReview'])->name('reviews.post');
Route::post('addToCart', [CartController::class, 'addProductToCart'])->name('addToCart.post');
Route::post('removeProductFromCart', [CartController::class, 'removeProductFromCart'])->name('removeProductFromCart.post');
Route::post('changeProductQuantityInCart', [CartController::class, 'changeProductQuantityInCart'])->name('changeProductQuantityInCart.post');
