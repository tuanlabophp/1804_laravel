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
    return view('welcome');
});
// List post
Route::get('posts', 'PostController@index');
// Them post, do chua co view nen de kieu get
Route::get('posts/store', 'PostController@store');
Route::get('posts/update', 'PostController@update');
Route::get('posts/delete', 'PostController@delete');

// Gop nhung route co duong dan bat dau bang post_builder
Route::group(['prefix' => 'post_builder'], function() {
	Route::get('/', 'PostController@index_builder');
	Route::get('store', 'PostController@store_builder');
	Route::get('update', 'PostController@update_builder');
	Route::get('delete/{id}', 'PostController@delete_builder');
});
// Gop nhung route lien quan den admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::get('/', 'AdminController@index')->middleware('auth');

	Route::group(['prefix' => 'cate', 'middleware' => 'auth'], function () {
		Route::get('/', 'CategoryController@index')->name('admin.cate.index');
		Route::get('add', 'CategoryController@add')->name('admin.cate.add');
		Route::get('edit/{id}', 'CategoryController@edit')->name('admin.cate.edit');
		Route::post('store', 'CategoryController@store')->name('admin.cate.store');
		Route::get('delete/{id}', 'CategoryController@delete')->name('admin.cate.delete');
		Route::post('update', 'CategoryController@update')->name('admin.cate.update');
	});

	Route::group(['prefix' => 'post', 'middleware' => 'auth'], function() {
		Route::get('/', 'PostController@index')->name('admin.post.index');
		Route::post('store', 'PostController@store')->name('admin.post.store');
		Route::get('edit/{id}', 'PostController@edit')->name('admin.post.edit');
		Route::post('update', 'PostController@update')->name('admin.post.update');
		Route::get('delete/{id}', 'PostController@delete')->name('admin.post.delete');
	});

	Route::get('login', 'LoginController@index')->name('admin.login.index');
	Route::post('login', 'LoginController@checkLogin')->name('admin.login.check');
	Route::get('logout', 'LoginController@logout')->name('admin.logout');
});
