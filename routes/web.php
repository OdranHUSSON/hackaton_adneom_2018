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


Route::get('/me', 'UserController@me')->name('me');
Route::get('/user/{id}', 'UserController@fetchOne')->name('Show one user');

Route::get('/category/{id}', 'TaskCategoryController@fetchOne')->name('Show one category');
