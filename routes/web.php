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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Cart
Route::group([
    'prefix' => 'cart',
    'as' => 'cart.',
    'middleware' => 'auth',
], function() {
    Route::get('/', 'CartController@index')->name('index');
    Route::get('/add/{id}', 'CartController@add')->name('add');
    Route::get('/remove/{id}', 'CartController@remove')->name('remove');
    Route::get('/clear', 'CartController@clear')->name('clear');
    Route::get('/confirm', 'CartController@confirm')->name('confirm');
    Route::post('/updates', 'CartController@updates')->name('updates');
    Route::post('/order', 'CartController@order')->name('order');
    Route::get('/result', 'CartController@result')->name('result');
});

//Admin Item
Route::group([
    'prefix' => 'admin/item',
    'namespace' => 'Admin',
    'as' => 'admin.item.',
], function () {
    Route::get('/', 'ItemController@index')->name('index');
    Route::get('create/', 'ItemController@create')->name('create');
    Route::post('add/', 'ItemController@add')->name('add');
    Route::get('edit/{id}', 'ItemController@edit')->name('edit');
    Route::post('update/{id}', 'ItemController@update')->name('update');
});
