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
Route::resource('ColoredEye','ColoredEyesController');
Route::post('/changeLenseColor','ContactLensesController@changeColor');



//mariam
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', function () {
    return view('contact')->render();
});
Route::resource('brand', 'BrandController');
Route::resource('glass', 'GlassController');
Route::get('sunglasses','GlassController@sunglasses');
Route::get('eyeglasses','GlassController@eyeglasses');
Route::get('/fav','GlassController@favourite');
// Route::get('/price/{option}/{type}', 'GlassController@sort');
Route::post('/price', 'GlassController@sort');
Route::get('favourite', 'UserController@myFavourite');
Route::get('admin/sunglasses','AdminController@sun');
Route::get('admin/eyeglasses','AdminController@eye');
Route::get('dashboard','AdminController@adminHome');
Route::get('chart', 'AdminController@adminHome');


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
Route::resource('/orderHistory', 'ClientOrdersController');
Route::get('allLenses','ContactLensesController@list');
Route::get('/search', 'ContactLensesController@search');
Route::get('/sort/{value}', 'ContactLensesController@sort');
Route::get('/ourLenses', function () {return view('OurLenses.index');});
Route::get('/ComfortLight1', function () {return view('OurLenses.ComfortLight1');});
Route::get('/ComfortLightActive1', function () {return view('OurLenses.ComfortLightActive1');});
Route::get('/ComfortLightPerformance1', function () {return view('OurLenses.ComfortLightPerformance1');});
Route::get('/rayban1', function () {return view('OurLenses.rayban1');});
Route::get('/ComfortLight2', function () {return view('OurLenses.ComfortLight2');});
Route::get('/ComfortLightActive2', function () {return view('OurLenses.ComfortLightActive2');});
Route::get('/ComfortLightPerformance2', function () {return view('OurLenses.ComfortLightPerformance2');});
Route::get('/rayban2', function () {return view('OurLenses.rayban2');});
Route::get('/ComfortLight3', function () {return view('OurLenses.ComfortLight3');});
Route::get('/ComfortLightActive3', function () {return view('OurLenses.ComfortLightActive3');});
Route::get('/ComfortLightPerformance3', function () {return view('OurLenses.ComfortLightPerformance3');});
Route::get('/rayban3', function () {return view('OurLenses.rayban3');});
Route::get('/ComfortLight4', function () {return view('OurLenses.ComfortLight4');});
Route::get('/ComfortLightActive4', function () {return view('OurLenses.ComfortLightActive4');});
Route::get('/ComfortLightPerformance4', function () {return view('OurLenses.ComfortLightPerformance4');});
Route::get('/rayban4', function () {return view('OurLenses.rayban4');});


