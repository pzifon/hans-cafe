<?php

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

Route::get('/booking', function () {
    return view('booking');
});
Route::post('create','App\Http\Controllers\BookingController@insert');

// Route::get('/menu', function () {
//     return view('menu');
// });

Route::get('/menu','App\Http\Controllers\MenuController@index');

Route::get('/cart', 'App\Http\Controllers\MenuController@cart');
Route::get('/add-to-cart/{code}', 'App\Http\Controllers\MenuController@addToCart');

Route::patch('/update-cart', 'App\Http\Controllers\MenuController@update');
Route::delete('/remove-from-cart', 'App\Http\Controllers\MenuController@remove');
// Route::get('/cart', function () {
//     return view('cart');
// });

require __DIR__.'/auth.php';
