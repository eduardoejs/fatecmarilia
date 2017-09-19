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

Route::get('/admin', 'Admin\HomeController@index')->name('admin.index');

Route::namespace('Admin\Users')->prefix('admin')->middleware('auth')->group(function(){
  Route::resource('users', 'UserController');
  Route::get('users/{id}/status/{status}', 'UserController@setStatus')->name('users.status');
  Route::get('users/delete/{id}', 'UserController@delete')->name('users.delete');
});
