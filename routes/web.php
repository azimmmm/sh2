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


use Illuminate\Support\Facades\Route;

//Route::group(['middleware'=>'admin'],function (){});


//
//Route::group(['prefix' => 'api'], function () {
//    Route::get('categories','backend\categoryController@apiIndex')->name('api.categories');
//});
Route::group(['prefix' => 'main'], function () {

    Route::get('/', 'backend\MainController@mainpage');
    Route::resource('categories', 'Backend\CategoryController');
    Route::get('categories/{id}/Setting', 'Backend\CategoryController@indexSetting')->name('categories.indexSetting');
    Route::post('categories/{id}/saveSetting', 'Backend\CategoryController@saveSetting');
    Route::resource('attributes-group', 'Backend\AttributeGroupController');
    Route::resource('attributes-value', 'Backend\AttributeValueController');
    Route::resource('brands', 'Backend\BrandController');
    Route::resource('photos', 'Backend\PhotoController');
    Route::resource('products', 'Backend\ProductController');
    Route::post('photos/upload','backend\PhotoController@upload')->name('photos.upload');
    Route::resource('coupons','backend\CouponController');
});
Route::resource('/','Frontend\HomeController');
Auth::routes();

Route::get('/cart', 'Frontend\CartController@getCart')->name('cart.get');
Route::get('/add-to-cart/{id}', 'Frontend\CartController@addToCart')->name('cart.add');
Route::post('coupon/add', 'Frontend\CouponController@addCoupon')->name('coupon.add');
Route::post('/remove-item/{id}', 'Frontend\CartController@remove')->name('cart.remove');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register-user', 'Frontend\UserController@register')->name('register-user');

Route::get('/register2', 'Auth\RegisterController@index')->name('register2');
Route::get('/register2/getCities/{id}','Auth\RegisterController@getCities')->name('getCities');
Route::group(['middleware'=>'auth'],function()
{
    Route::get('/profile','Frontend\UserController@profile')->name('user.profile');

});