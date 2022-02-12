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

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/editacc', function () {
    return view('editaccount');
});

Route::post('create','App\Http\Controllers\BookingController@insert');

// Route::get('/loyalty', function () {
//     return view('loyalty');
// });

Route::get('/loyalty','App\Http\Controllers\CustAccController@index');
Route::get('/dashboard','App\Http\Controllers\CustAccController@index');

// Route::get('/menu', function () {
//     return view('menu');
// });

Route::get('/menu','App\Http\Controllers\MenuController@index');

require __DIR__.'/auth.php';
