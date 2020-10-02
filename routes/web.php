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

//act as homepage
Route::get('/', function () {
    return redirect()->route('home_pizza', 'all');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('pizza')->group(function() {
    Route::get('/home/{pizza_name}', 'PizzaController@index')->name('home_pizza');
    Route::get('/create', 'PizzaController@create')->name('create_pizza');
    Route::get('/edit/{id}', 'PizzaController@edit')->name('edit_pizza');
    Route::get('/detail/{id}', 'PizzaController@show')->name('show_pizza');
    Route::post('/store', 'PizzaController@store')->name('store_pizza');
    Route::post('/update/{id}', 'PizzaController@update')->name('update_pizza');
    Route::post('/delete/{id}', 'PizzaController@destroy')->name('delete_pizza');
});

Route::prefix('cart')->group(function() {
    Route::post('/store/{pizza_id}}', 'CartController@store')->name('add_cart');
    Route::post('/update/{id}', 'CartController@update')->name('update_cart');
    Route::get('/destroy-all/{user_id}', 'CartController@destroyAllCart')->name('destroy_all_cart');
    Route::get('/destroy/{id}', 'CartController@destroyperid')->name('destroy_cart');
});
Route::get('/view-cart', 'CartController@index')->name('view_cart');

Route::prefix('transaction')->group(function() {
    Route::post('/store/{user_id}', 'TransactionController@store')->name('add_transac');
    Route::get('/view-all', 'TransactionController@showAllTransac')->name('view_transac_all');
    Route::get('/view/{user_id}', 'TransactionController@index')->name('view_transac');
    Route::get('/detail/{created_time}', 'TransactionController@show')->name('view_transac_detail');
});

Route::prefix('user')->group(function() {
    Route::get('/view', 'UserController@index')->name('view_users');
});