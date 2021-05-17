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

Route::get('/', 'DomainController@showProduct');
Route::get('/AddCart/{id}', 'CartController@AddCart');
Route::get('/Delete/{id}','CartController@DeleteItemCart');
Route::get('/DeleteItemCart/{id}','CartController@DeleteItemListCart');
Route::get('/UpdateCart/{id}/{quantity}','CartController@UpdateCart');
Route::get('/{name?}', 'DomainController@index');
Route::get('/shop-details/{id}', 'DomainController@show');

Route::get('/admin/{name?}', 'DomainController@indexAdmin');
Route::get('/', function(){return view('admin.pages.home');});