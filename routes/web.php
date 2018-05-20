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

Route::get('/', 'PageController@index');

Route::get('about', 'PageController@about');

Route::get('contact', 'PageController@contact');

Route::get('danh-muc-san-pham/{slug}', 'ProductController@category')->name('product_category');

Route::get('san-pham/{slug}', 'ProductController@product')->name('product');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('users/create','UserController@create')->name('users.create');
    Route::post('users/create','UserController@store');

    Route::get('users/edit/{id}','UserController@edit')->name('users.edit');
    Route::post('users/edit/{id}','UserController@update');
    
    Route::get('users','UserController@index')->name('users.index');
    Route::get('usergroups', function(){})->name('usergroups.index');

    Route::get('test','PageController@index');
    Route::get('logout','PageController@index')->name('logout');
});
