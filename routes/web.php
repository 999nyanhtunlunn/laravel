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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// For Category
Route::get('/category-create', 'CategoryController@create')->name('catcreate');
Route::post('/category-create', 'CategoryController@store')->name('catstore');
Route::get('/category-edit/{id}', 'CategoryController@edit')->name('catedit');
Route::post('/category-edit/{id}', 'CategoryController@update')->name('catupdate');
Route::get('/category-delete/{id}', 'CategoryController@destroy')->name('catdelete');


// For Post
Route::get('/posts', 'PostController@index')->name('postindex');
Route::get('/create', 'PostController@create')->name('postcreate');
Route::post('/create', 'PostController@store')->name('poststore');
Route::get('/edit/{id}', 'PostController@edit')->name('postedit');
Route::post('/edit/{id}', 'PostController@update')->name('postupdate');
Route::get('/delete/{id}', 'PostController@destroy')->name('postdelete');
Route::get('/show/{id}', 'PostController@show')->name('postshow');
Route::get('/user/{id}', 'UserController@show')->name('profile');



