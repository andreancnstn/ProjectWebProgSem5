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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['isLogin']], function() {
    Route::prefix('pizza')->group(function() {
        Route::group(['middleware' => ['forAdmin']], function () {
            Route::get('/create', 'PizzaController@create')->name('create_pizza');
            Route::get('/edit/{id}', 'PizzaController@edit')->name('edit_pizza');
            Route::post('/store', 'PizzaController@store')->name('store_pizza');
            Route::post('/update/{id}', 'PizzaController@update')->name('update_pizza');
            Route::get('/delete/{id}', 'PizzaController@delete')->name('delete_pizza');
            Route::post('/destroy/{id}', 'PizzaController@destroy')->name('destroy_pizza');
        });
    });

    Route::group(['middleware' => ['forMember']], function () {
        Route::prefix('cart')->group(function() {
            Route::post('/store/{pizza_id}}', 'CartController@store')->name('add_cart');
            Route::get('/view-cart', 'CartController@index')->name('view_cart');
            Route::post('/update/{id}', 'CartController@update')->name('update_cart');
            Route::get('/destroy-all/{user_id}', 'CartController@destroyAllCart')->name('destroy_all_cart');
            Route::delete('/destroy/{id}', 'CartController@destroyperid')->name('destroy_cart');
        });
    });


    Route::prefix('transaction')->group(function() {
        Route::group(['middleware' => ['forMember']], function () {
            Route::post('/store/{user_id}', 'TransactionController@store')->name('add_transac');
            Route::get('/view/{user_id}', 'TransactionController@index')->name('view_transac');
        });
        Route::group(['middleware' => ['forAdmin']], function () {
            Route::get('/view-all', 'TransactionController@showAllTransac')->name('view_transac_all');
        });
        Route::get('/detail/{created_time}', 'TransactionController@show')->name('view_transac_detail');
    });

    Route::group(['middleware' => ['forAdmin']], function () {
        Route::prefix('user')->group(function() {
            Route::get('/view', 'UserController@index')->name('view_users');
        });
    });
});

Route::prefix('pizza')->group(function() {
    Route::get('/home', 'PizzaController@index')->name('home_pizza');
    Route::get('/detail/{id}', 'PizzaController@show')->name('show_pizza');
});

Route::get('/storage/{url}', 'PizzaController@seeImage')->name('showImage');
