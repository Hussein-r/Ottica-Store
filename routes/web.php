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
Route::get('/mail/{id}', 'SendEmailController@mailOne')->name('mail');
Route::get('/mail', 'SendEmailController@mailAll')->name('mail');
Route::post('/mail', 'SendEmailController@send')->name('mail');
Route::resource('user','UserController');
Route::post('/changecolor','GlassController@changeColor')->name('changecolor');
//mariam
Route::resource('brand', 'BrandController');
Route::resource('glass', 'GlassController');
Route::get('sunglasses','GlassController@sunglasses');
Route::get('eyeglasses','GlassController@eyeglasses');
//hajar
Route::resource('specialoffers','specialOffersController');
Route::resource('orderslist','ListOrdersController');
Route::get('processing/{id}', 'ListOrdersController@processingOrder');
Route::get('done/{id}', 'ListOrdersController@doneOrder');
Route::get('orders/inactive', 'ListOrdersController@inactiveOrdersList');
Route::get('orders/processing', 'ListOrdersController@processingOrdersList');
Route::get('orders/done', 'ListOrdersController@doneOrdersList');






