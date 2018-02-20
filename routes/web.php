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

Route::get('/', function () {
    return view('admin.metronic.test');
});

// Route::get('/admincp', function () {
// 	return view('admin.metronic.test');
// });

Auth::routes();

Route::get('/chuadangnhap', function(){
	return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

/* -----------------------------------
|	admin routes
-------------------------------------*/

// login
Route::get('admincp/login', 'Admin\AuthController@getLogin')->name('admin.login');
Route::post('admincp/login', 'Admin\AuthController@postLogin');

// logged in area
Route::group(['prefix' => 'admincp','namespace' => 'Admin','middleware' => 'auth'], function(){
	Route::get('/', 'PageController@index')->name('admin.dashboard');
	Route::get('logout', 'AuthController@logout')->name('admin.logout');

	// Posts
	Route::get('posts', 'PostController@index')->name('admin.posts.index');
	Route::get('posts/create', 'PostController@create')->name('admin.posts.create');
	Route::post('posts/create','PostController@store');
	Route::get('posts/edit/{id}','PostController@edit')->name('admin.posts.edit');
	Route::post('posts/edit/{id}','PostController@update');
	Route::post('posts/delete/{id}','PostController@destroy')->name('admin.posts.delete');

	// Categories
	Route::get('categories', 'CategoryController@index')->name('admin.categories.index');
	// Route::get('categories/create', 'CategoryController@create')->name('admin.categories.create');
	Route::post('categories/create','CategoryController@store')->name('admin.categories.create');
	Route::get('categories/edit/{id}','CategoryController@edit')->name('admin.categories.edit')->where('id','[0-9]+');
	Route::post('categories/edit/{id}','CategoryController@update');
	Route::post('categories/delete/{id}','CategoryController@destroy')->name('admin.categories.delete');

	// Tags
	Route::get('tags', 'TagController@index')->name('admin.tags.index');

	//users
	Route::get('users','UserController@index')->name('admin.users.index');
	Route::get('users/create','UserController@create')->name('admin.users.create');
	Route::post('users/create','UserController@store');
	Route::get('users/edit/{id}','UserController@edit')->name('admin.users.edit');
	Route::post('users/edit/{id}','UserController@update');
	Route::post('users/delete/{id}','UserController@destroy')->name('admin.users.delete');
	Route::get('users/profile','UserController@profile')->name('admin.users.profile');

	Route::get('test','PageController@test');

});

/* front */
Route::get('posts/{id}','PostController@show')->name('posts.show');
