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
    Route::post('photos/upload', 'Backend\PhotoController@upload')->name('photos.upload');
    Route::resource('coupons', 'Backend\CouponController');
    Route::get('/orders', 'Backend\orderController@index')->name('orders.index');
});
Auth::routes();

//front route
Route::resource('/', 'Frontend\HomeController');
Route::get('/cart', 'Frontend\CartController@getCart')->name('cart.get');
Route::get('/add-to-cart/{id}', 'Frontend\CartController@addToCart')->name('cart.add');
Route::post('coupon/add', 'Frontend\CouponController@addCoupon')->name('coupon.add');
Route::post('/remove-item/{id}', 'Frontend\CartController@remove')->name('cart.remove');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register-user', 'Frontend\UserController@register')->name('register-user');
Route::get('/register2', 'Auth\RegisterController@index')->name('register2');
Route::get('/register2/getCities/{id}', 'Auth\RegisterController@getCities')->name('getCities');
Route::get('/products/{slug}','Frontend\ProductController@getProduct')->name('product.single');
Route::get('category/{id}/{pages?}','Frontend\ProductController@getProductByCategory')->name('category.index');
Route::get('search','Frontend\ProductController@searchProduct')->name('product.search');

//front with middleware
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', 'Frontend\UserController@profile')->name('user.profile');
Route::get('/order-verify','Frontend\orderController@verify')->name('order.verify');
Route::get('/payment-verify/{id}','Frontend\PaymentController@verify')->name('payment.verify');
});