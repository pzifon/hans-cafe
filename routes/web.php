<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:customer']], function() {
    Route::get('/editacc', 'App\Http\Controllers\DashboardController@viewCustinfo')->name('editAcc');
    Route::post('edit', 'App\Http\Controllers\DashboardController@editCustInfo')->name('editAccFunction');

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::post('insert', [CartController::class, 'insertToDatabase'])->name('cart.insert');

    Route::post('create','App\Http\Controllers\BookingController@insert');
    Route::post('cancel','App\Http\Controllers\BookingController@remove');
});

Route::get('/purchases', 'App\Http\Controllers\PurchaseController@index');
Route::post('viewDetails','App\Http\Controllers\PurchaseController@viewDetails');

Route::get('/reward','App\Http\Controllers\RewardController@index')->name('reward');

Route::get('/menu', [MenuController::class, 'menuList'])->name('menu.list');

Route::get('/booking', function () {
    return view('booking');
});

Route::group(['middleware' => ['auth', 'role:employee']], function() {
    Route::get('/clockIn', 'App\Http\Controllers\ClockInController@clockIn');
    Route::get('/clockOut', 'App\Http\Controllers\ClockInController@clockOut');
});

Route::group(['middleware' => ['auth', 'role:employee|admin']], function() {
    Route::get('/order', 'App\Http\Controllers\MenuController@orderMenu')->name('order');
    Route::get('/reservation', 'App\Http\Controllers\BookingController@viewReservation');
});
require __DIR__.'/auth.php';
