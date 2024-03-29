<?php

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

Route::get('/checkout/{item}', function ($item) {
    return view('checkout_form', ['item' => App\Product::find($item)]);
});

//Route::post('/checkout-success', function(){
//   return 'Successful purchase!';
//});

Route::post('/checkout-success', 'CheckoutController@success');
