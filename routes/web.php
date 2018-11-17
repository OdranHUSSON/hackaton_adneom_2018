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
//home
Route::get('/home', 'HomeController@index')->name('home');
//users
Route::get('/me', 'UserController@fetchOne')->name('me');
Route::get('/user/{id}', 'UserController@fetchOne')->name('Show one user');
//tasks
Route::get('/category/{id}', 'TaskCategoryController@fetchOne')->name('Show one category');
Route::get('/task/check/{id}', 'TaskController@attachTask')->name('Check one task');
Route::get('/task/uncheck/{id}', 'TaskController@detachTask')->name('Uncheck one task');
