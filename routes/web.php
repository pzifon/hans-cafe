<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard','App\Http\Controllers\CustAccController@index');

Route::get('/editacc', 'App\Http\Controllers\CustAccController@viewinfo');
Route::post('edit', 'App\Http\Controllers\CustAccController@editInfo');

Route::get('/purchases', 'App\Http\Controllers\PurchaseController@index');
Route::post('viewDetails','App\Http\Controllers\PurchaseController@viewDetails');

Route::get('/booking', function () {
    return view('booking');
});
Route::post('create','App\Http\Controllers\BookingController@insert');
Route::post('cancel','App\Http\Controllers\BookingController@remove');

// Route::get('/menu', function () {
//     return view('menu');
// });

// Route::get('/menu','App\Http\Controllers\MenuController@index');

// Route::get('/cart', 'App\Http\Controllers\MenuController@cart');
// Route::get('/add-to-cart/{code}', 'App\Http\Controllers\MenuController@addToCart');

// Route::patch('/update-cart', 'App\Http\Controllers\MenuController@update');
// Route::delete('/remove-from-cart', 'App\Http\Controllers\MenuController@remove');
// Route::get('/cart', function () {
//     return view('cart');
// });

Route::get('/menu', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

require __DIR__.'/auth.php';
