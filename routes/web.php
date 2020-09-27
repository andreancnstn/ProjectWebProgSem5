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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home-pizza', 'PizzaController@index')->name('home_pizza');
Route::get('/create-pizza', 'PizzaController@create')->name('create_pizza');
Route::get('/edit-pizza/{id}', 'PizzaController@edit')->name('edit_pizza');
Route::get('/detail-pizza/{id}', 'PizzaController@show')->name('show_pizza');
Route::post('/store-pizza', 'PizzaController@store')->name('store_pizza');
Route::post('/update-pizza/{id}', 'PizzaController@update')->name('update_pizza');
Route::get('/delete-pizza/{id}', 'PizzaController@destroy')->name('delete_pizza');

Route::post('/add-to-cart/{id}', 'CartController@store')->name('add_cart');

