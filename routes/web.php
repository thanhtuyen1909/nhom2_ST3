<?php

use App\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Admin
Route::get('/admin', 'AdminController@getLogin')->name('loginAdmin');
Route::post('/admin/toLogin', 'AdminController@login');
Route::get('/admin/hd/{id}','AdminController@view');
Route::get('/admin/download/{id}','AdminController@download');
Route::group(['middleware' => ['admin']], function () {
    //
    Route::get('/admin/logout', 'AdminController@logout');
    Route::group(['middleware' => ['super']], function () {
      
       
        // Banner
        Route::get('/admin/deleteBanner/{id}', 'BannerController@destroy');
        Route::get('/admin/deleteBanner1/{id}', 'BannerController@destroy1');
        Route::get('/admin/deleteBanner2/{id}', 'BannerController@destroy2');

        // Comment
        Route::post('/admin/deleteComment', 'AdminController@destroy_comment');

        // Account
        Route::post('/admin/add-account', 'UserController@store');
        Route::get('/admin/edit-account/{id}', 'UserController@showAccount');
        Route::post('/admin/edit-account/{id}', 'UserController@updateAccount');
        Route::get('/admin/changePass/{email}', 'UserController@showChangPage');
        Route::post('/admin/changePass/{email}', 'UserController@changePass');
        Route::post('/admin/editProfile', 'UserController@edit');

        // Product
        Route::post('/admin/upload/{id}', 'ProductController@update');
        Route::get('/admin/edit-product/{id}', 'ProductController@show');
        Route::get('/admin/deleteProduct/{id}', 'ProductController@destroy');

        // Protype
        Route::get('/admin/edit-protype/{id}', 'ProtypeController@show');
        Route::post('/admin/editProtype/{id}', 'ProtypeController@update');
        Route::get('/admin/deleteProtype/{id}', 'ProtypeController@destroy');
    });

    // Banner
    Route::get('/admin/banner', 'BannerController@index');
    Route::get('/admin/add-banner', 'BannerController@create');
    Route::get('/admin/edit-banner/{id}', 'BannerController@show');
    Route::post('/admin/addBanner', 'BannerController@store');
    Route::post('/admin/editBanner/{id}', 'BannerController@update');
    Route::resource('banner', 'BannerController');

    //Comment
    Route::post('/admin/reply-comment', 'AdminController@reply_comment');


    //Contact
    Route::get('/admin/listContact', 'AdminController@showListContact');
    Route::get('/admin/updateSeen/{id}', 'AdminController@updateListContact');

    // Account: 
    Route::get('/admin/rolechange/{id}', 'UserController@rolechange');

    // Product
    Route::get('/admin/products', 'ProductController@index')->name('product');
    Route::post('/admin/add', 'ProductController@store');

    // Order
    Route::get('/admin/listDonHang', 'OrderController@show');
    Route::get('/admin/order-detail/{id}', 'OrderController@showDetail');
    Route::get('/admin/updateDH/{id}/{value}', 'OrderController@changeStatus');

    // Route::get('/admin', 'AdminController@showAdmin');
    Route::get('/admin/{name?}', 'AdminController@indexAdmin');

    // Protype
    Route::post('/admin/addProtype', 'ProtypeController@store');
});

//Banner



// User
Route::get('/', 'DomainController@showProduct')->name('index');
Route::post('/checkoutInput', 'DomainController@createDonHang');
Route::post('/sendContact', 'DomainController@createContact');
Route::post('/loadComment', 'DomainController@loadComment');
Route::post('/postComment', 'DomainController@createComment');
Route::get('/replyComment', 'DomainController@createChildComment');
Route::get('/AddCart/{id}/{quantity}', 'CartController@AddCart');
Route::get('/Delete/{id}', 'CartController@DeleteItemCart');
Route::get('/DeleteItemCart/{id}', 'CartController@DeleteItemListCart');
Route::get('/checkCart/{id}/{quantity}', 'CartController@checkCart');


Route::post('/profile/{id}', 'UserController@profileUpdate')->name('user.profile.update');
Route::get('/profile', 'UserController@userProfile')->name('user.profile');
Route::get('/changepassword', 'UserController@changePassword')->name('user.change.password');
Route::post('/changepassword/save', 'UserController@changPasswordStore')->name('user.changepass.save');

Route::get('/DeleteAllItemCart', 'CartController@DeleteAllItemCart');
Route::get('/DeleteOneOfItemCart/{id}', 'CartController@DeleteOneOfItemCart');
Route::get('/UpdateCart/{id}/{quantity}', 'CartController@UpdateCart');
Route::get('/addFavourite/{id}', 'DomainController@Favourite');
Route::get('/DeleteFavourite/{id}', 'DomainController@DeleteFavourite');
Route::get('/shop-details/{id}', 'DomainController@show');
Route::get('/shop-grid', 'DomainController@showShopGrid');
Route::get('/order-details/{id}', 'DomainController@showOrderDetail');


Route::get('/classifiProduct/{id}', 'DomainController@showProtype');
Route::post('/search', 'DomainController@getSearch')->name('getSearch');

Auth::routes();

Route::get('/login', 'DomainController@getLogin')->name('login');
Route::get('/logout', 'DomainController@logout');
Route::get('/listOrder', 'DomainController@showDonHang');
Route::get('/{name?}', 'DomainController@index');

Route::get('/home', 'HomeController@index')->name('home');
