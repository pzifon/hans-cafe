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

Route::get('/loyalty', function () {
    return view('loyalty');
});

// Route::get('/menu', function () {
//     return view('menu');
// });

Route::get('/menu','App\Http\Controllers\MenuController@index');

require __DIR__.'/auth.php';
