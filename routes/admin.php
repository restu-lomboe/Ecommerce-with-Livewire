<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/dashboard', 'Admin\PageController@index')->name('dashboard');

//category
Route::get('/category', 'Admin\CategoryController@index')->name('category');
//add category
Route::get('/category/add', 'Admin\CategoryController@add')->name('add.category');
//edit category
Route::get('/category/{id}', 'Admin\CategoryController@edit')->name('edit.category');

//brand
Route::get('/brand', 'Admin\BrandController@index')->name('brand');
//add brand
Route::get('/brand/add', 'Admin\BrandController@add')->name('add.brand');
//edit brand
Route::get('/brand/{id}', 'Admin\BrandController@edit')->name('edit.brand');

//products
Route::get('/product', 'Admin\ProductController@index')->name('product');
//add products
Route::get('/product/add', 'Admin\ProductController@add')->name('add.product');
//edit Products
Route::get('/product/{id}', 'Admin\ProductController@edit')->name('edit.product');
