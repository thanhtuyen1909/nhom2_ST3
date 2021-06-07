<?php

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
// Product
Route::get('/admin/products', 'ProductController@index')->name('product');
Route::post('/admin/add', 'ProductController@store');
Route::post('/admin/upload/{id}', 'ProductController@update');
Route::get('/admin/edit-product/{id}', 'ProductController@show');
Route::get('/admin/deleteProduct/{id}', 'ProductController@destroy');

Route::get('/admin', 'AdminController@showAdmin');
Route::get('/admin/{name?}', 'AdminController@indexAdmin');

// Protype
Route::get('/admin/edit-protype/{id}', 'ProtypeController@show');
Route::post('/admin/addProtype', 'ProtypeController@store');
Route::post('/admin/editProtype/{id}', 'ProtypeController@update');
Route::get('/admin/deleteProtype/{id}', 'ProtypeController@destroy');

// User
Route::get('/', 'DomainController@showProduct');
Route::post('/checkoutInput','DomainController@createDonHang');
Route::post('/sendContact','DomainController@createContact');
Route::get('/AddCart/{id}/{quantity}', 'CartController@AddCart');
Route::get('/Delete/{id}','CartController@DeleteItemCart');
Route::get('/DeleteItemCart/{id}','CartController@DeleteItemListCart');
Route::get('/DeleteOneOfItemCart/{id}','CartController@DeleteOneOfItemCart');
Route::get('/UpdateCart/{id}/{quantity}','CartController@UpdateCart');
Route::get('/addFavourite/{id}','DomainController@Favourite');
Route::get('/DeleteFavourite/{id}','DomainController@DeleteFavourite');
Route::get('/shop-details/{id}', 'DomainController@show');
Route::get('/shop-grid','DomainController@showShopGrid');
Route::get('/order-details/{id}', 'DomainController@showOrderDetail');


Route::get('/classifiProduct/{id}', 'DomainController@showProtype');
Route::post('/search', 'DomainController@getSearch')->name('getSearch');

Auth::routes();
Route::get('/login','DomainController@getLogin');
Route::get('/logout', 'DomainController@logout');
Route::get('/{name?}', 'DomainController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
