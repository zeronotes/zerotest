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


Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
	/* Users */
    Route::get('users/create','UserController@create')->name('users.create');
    Route::post('users/create','UserController@store');
    Route::get('users/edit/{id}','UserController@edit')->name('users.edit');
    Route::patch('users/edit/{id}','UserController@update');
    Route::get('users','UserController@index')->name('users.index');
    Route::delete('users/delete/{id}','UserController@destroy')->name('users.delete');

    // Groups
    Route::get('user-groups', function(){})->name('usergroups.index');

    /* Posts */
    Route::get('posts/show/{id}','PostController@show');
    Route::get('posts','PostController@index')->name('posts.index');
    Route::get('posts/create','PostController@create')->name('posts.create');
    Route::post('posts/create','PostController@store');
    Route::get('posts/edit/{id}','PostController@edit')->name('posts.edit');
    Route::patch('posts/edit/{id}','PostController@update');
    Route::delete('posts/delete/{id}','PostController@delete')->name('posts.delete');
    Route::delete('posts/permanently-delete/{id}','PostController@destroy')->name('posts.destroy');
    Route::get('posts/create-slug', function() {
        exit('wtf');
    })->name('posts.createSlug');
    Route::post('posts/create-slug','PostController@createSlug')->name('posts.createSlug');

    // Categories
    Route::get('categories','CategoryController@index')->name('categories.index');
    Route::get('categories/create','CategoryController@create')->name('categories.create');
    Route::post('categories/create','CategoryController@store');
    Route::get('categories/edit/{id}','CategoryController@edit')->name('categories.edit');
    Route::patch('categories/edit/{id}','CategoryController@update');
    Route::delete('categories/delete/{id}','CategoryController@destroy')->name('categories.delete');
    Route::get('categories/search','CategoryController@search')->name('categories.search');
    Route::post('categories/search','CategoryController@search');

    // Tags
    Route::get('tags','TagController@index')->name('tags.index');
    Route::get('tags/create','TagController@create')->name('tags.create');
    Route::post('tags/create','TagController@store');
    Route::get('tags/edit/{id}','TagController@edit')->name('tags.edit');
    Route::patch('tags/edit/{id}','TagController@update');
    Route::delete('tags/delete/{id}','TagController@destroy')->name('tags.delete');

    /* Pages */
    Route::get('pages','PageController@index')->name('pages.index');
    Route::get('pages/create','PageController@create')->name('pages.create');
    Route::post('pages/create','PageController@store');
    Route::get('pages/edit/{id}','PageController@edit')->name('pages.edit');
    Route::patch('pages/edit/{id}','PageController@update');
    Route::delete('pages/delete','PageController@delete')->name('pages.delete');
    Route::delete('pages/permanently-delete/{id}','PageController@destroy')->name('pages.destroy');

    /* Products */
    Route::get('products','ProductController@index')->name('products.index');
    Route::get('products/create','ProductController@create')->name('products.create');
    Route::post('products/create','ProductController@store');
    Route::get('products/edit/{id}','ProductController@edit')->name('products.edit');
    Route::patch('products/edit/{id}','ProductController@update');
    Route::delete('products/delete/{id}','ProductController@delete')->name('products.delete');
    Route::delete('products/permanently-delete/{id}','ProductController@destroy')->name('products.destroy');

    // Product Categories
    Route::get('product-categories','ProductCategoryController@index')->name('pcategories.index');
    Route::get('product-categories/create','ProductCategoryController@create')->name('pcategories.create');
    Route::post('product-categories/create','ProductCategoryController@store');
    Route::get('product-categories/edit/{id}','ProductCategoryController@edit')->name('pcategories.edit');
    Route::patch('product-categories/edit/{id}','ProductCategoryController@update');
    Route::delete('product-categories/delete/{id}','ProductCategoryController@destroy')->name('pcategories.delete');

    /* Comments */
    Route::get('comments','CommentController@index')->name('comments.index');
    Route::get('comments/edit/{id}','CommentController@edit')->name('comments.edit');
    Route::patch('comments/edit/{id}','CommentController@update');
    Route::delete('comments/delete/{id}','CommentController@delete')->name('comments.delete');
    Route::delete('comments/permanently-delete/{id}','CommentController@destroy')->name('comments.destroy');

    Route::get('/','PageController@dashboard')->name('dashboard');
    Route::get('logout','PageController@index')->name('logout');
});
