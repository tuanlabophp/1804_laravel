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
Route::get('/posts', 'PostController@index');
// Them post, do chua co view nen de kieu get
Route::get('/posts/store', 'PostController@store');
Route::get('posts/update', 'PostController@update');
Route::get('posts/delete', 'PostController@delete');