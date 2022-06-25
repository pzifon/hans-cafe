<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\OrderController;
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

Route::get('/menu', [MenuController::class, 'menuList'])->name('menu.list');

Route::get('/booking', function () {
    return view('booking');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/purchases', 'App\Http\Controllers\PurchaseController@index');
    Route::get('viewDetails/{id}', [PurchaseController::class, 'viewDetails']);
});



Route::group(['middleware' => ['auth', 'role:customer']], function() {
    Route::get('/editacc', 'App\Http\Controllers\DashboardController@reviewInfo')->name('editAcc');
    Route::post('edit', 'App\Http\Controllers\DashboardController@editCustInfo');

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    Route::post('insert', [CartController::class, 'insertToDatabase'])->name('cart.insert');

    Route::post('create','App\Http\Controllers\BookingController@insert');
    Route::post('cancel','App\Http\Controllers\BookingController@remove');

    Route::get('/reward','App\Http\Controllers\RewardController@index')->name('reward');
    Route::post('claim','App\Http\Controllers\RewardController@claim');
});


Route::group(['middleware' => ['auth', 'role:employee']], function() {
    Route::get('/clockIn', 'App\Http\Controllers\ClockInController@clockIn');
    Route::get('/clockOut', 'App\Http\Controllers\ClockInController@clockOut');
    Route::get('/customerinfo', 'App\Http\Controllers\DashboardController@custList');
});


Route::group(['middleware' => ['auth', 'role:admin']], function() {
    
    Route::get('/accmanagement', 'App\Http\Controllers\DashboardController@accManagement');
    Route::get('/viewEmp/{id}', 'App\Http\Controllers\DashboardController@viewEmp')->name("viewEmp");
    Route::get('/editEmpAcc/{id}', 'App\Http\Controllers\DashboardController@reviewEmpInfo')->name('editEmpAcc');
    Route::post('editEmp', 'App\Http\Controllers\DashboardController@editEmpInfo');
    Route::post('addEmp', 'App\Http\Controllers\DashboardController@addEmp');

    Route::get('/payroll', 'App\Http\Controllers\PayrollController@index');
    Route::post('/payroll/filter', 'App\Http\Controllers\PayrollController@filter');

    Route::get('/revenue', 'App\Http\Controllers\RevenueController@revenueByYear')->name('revenueByYear');
    Route::get('/revenue/lastmonth', 'App\Http\Controllers\RevenueController@revenueLastMonth')->name('revenueLastMonth');
    Route::get('/revenue/thismonth', 'App\Http\Controllers\RevenueController@revenueThisMonth')->name('revenueThisMonth');
    Route::get('/revenue/Past7Days', 'App\Http\Controllers\RevenueController@revenuePast7Days')->name('revenuePast7Days');
    Route::post('/revenue/revenueCustomDate', 'App\Http\Controllers\RevenueController@revenueCustomDate')->name('revenueCustomDate');
});

Route::group(['middleware' => ['auth', 'role:employee|admin']], function() {
    Route::get('/order', 'App\Http\Controllers\MenuController@orderMenu')->name('order');
    Route::get('/orderlist', 'App\Http\Controllers\OrderController@orderList')->name('orderlist');
    
    Route::get('/reservation', 'App\Http\Controllers\BookingController@index');
    Route::get('/inventory', 'App\Http\Controllers\InventoryController@index');
    Route::get('/edit_inventory/{category}', 'App\Http\Controllers\InventoryController@edit');
    Route::post('add','App\Http\Controllers\InventoryController@add');
    Route::post('update','App\Http\Controllers\InventoryController@update');
    
    Route::get('/viewCust/{id}', 'App\Http\Controllers\DashboardController@viewCust');
    Route::get('/viewCustReward/{id}','App\Http\Controllers\RewardController@viewCustReward');
    
    Route::get('/editMenu/{id}', 'App\Http\Controllers\MenuController@editMenu')->name('editMenu');
    Route::post('editMenuItem', 'App\Http\Controllers\MenuController@editMenuItem');
    Route::get('/addMenu', function () {
        return view('addMenu');
    });
    Route::post('addMenuItem', 'App\Http\Controllers\MenuController@addMenuItem');
    Route::get('/delete/{id}','App\Http\Controllers\MenuController@delete');

    Route::get('additem/{menu_code}', [MenuController::class, 'additem']);
    Route::get('getitem/', [MenuController::class, 'getItem']);
    Route::post('orderpos', [OrderController::class, 'orderItem']);
    // Route::get('vieworder/', [OrderController::class, 'getOrder']);
    Route::get('showorder/{purchase_id}', [OrderController::class, 'getOrder']);
    Route::get('payitem/{purchase_id}', [OrderController::class, 'payOrder']);
});

require __DIR__.'/auth.php';