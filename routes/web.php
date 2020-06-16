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
Route::resource('brand', 'BrandController');
Route::get('/mail/{id}', 'SendEmailController@mailOne')->name('mail');
Route::get('/mail', 'SendEmailController@mailAll')->name('mail');
Route::post('/mail', 'SendEmailController@send')->name('mail');
Route::resource('user','UserController');
Route::post('/changecolor','GlassController@changeColor')->name('changecolor');
Route::resource('order','ClientOrdersController');
Route::resource('cart','CartController');
Route::resource('SingleVisionLense','SingleVisionController');
Route::resource('ProgressiveVisionLense','ProgressiveVisionController');
Route::resource('BifocalLense','BifocalController');
Route::resource('comment','CommentsController');


//mariam
Route::resource('brand', 'BrandController');
Route::resource('glass', 'GlassController');
Route::get('sunglasses','GlassController@sunglasses');
Route::get('eyeglasses','GlassController@eyeglasses');
Route::get('/fav','GlassController@favourite');
Route::get('/sort/{option}', 'GlassController@sort');
Route::get('favourite', 'UserController@myFavourite');
//hajar
//specail offers & list orders for admin 
Route::resource('specialoffers','SpecialOffersController');
Route::resource('orderslist','ListOrdersController');
Route::get('processing/{id}', 'ListOrdersController@processingOrder');
Route::get('done/{id}', 'ListOrdersController@doneOrder');
Route::get('orders/inactive', 'ListOrdersController@inactiveOrdersList');
Route::get('orders/processing', 'ListOrdersController@processingOrdersList');
Route::get('orders/done', 'ListOrdersController@doneOrdersList');
//our special offers home
Route::get('offers','SpecialOffersController@list');

//our brands home page 
Route::resource('ourbrands','OurBrandsController');
Route::get('ourbrands/home','OurBrandsController@returnHome');

//best seller home page
Route::resource('bestseller','BestSellerController');



//haidy
Route::resource('lenses', 'ContactLensesController');
Route::resource('lenseBrand', 'LenseBrandController');
Route::resource('lensetype', 'LenseTypeController');
Route::get('/details/{lense}','ContactLensesController@details');
Route::resource('LenseManufacturerer', 'LenseManufacturererController');
Route::get('allLenses','ContactLensesController@list');
Route::get('/search', 'ContactLensesController@search');
Route::get('/sort/{value}', 'ContactLensesController@sort');



