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
Route::get('/category/add', 'Admin\CategoryController@add')->name('add.category');
//post category
