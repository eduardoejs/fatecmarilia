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
Route::get('/logout', 'Auth\LoginController@logout')->name('users.logout');

Route::namespace('Admin\Users')->prefix('admin')->group(function(){
  Route::resource('users', 'UserController');
  Route::post('users/search', 'UserController@pesquisar')->name('users.pesquisa');
  Route::get('users/{id}/status/{status}', 'UserController@setStatus')->name('users.status');
  Route::get('users/alunos/list', 'UserController@listarAlunos')->name('users.alunos.listar');
  Route::get('users/ex-alunos/list', 'UserController@listarExAlunos')->name('users.exalunos.listar');
});

Route::prefix('aluno')->group(function (){
    Route::get('/', 'Admin\Users\AlunoController@index')->name('aluno.index');

    //Login routes
    Route::get('/login', 'Auth\Users\AlunoLoginController@showLoginForm')->name('aluno.login');
    Route::post('/login', 'Auth\Users\AlunoLoginController@login')->name('aluno.login.submit');
    Route::get('/logout', 'Auth\Users\AlunoLoginController@logout')->name('aluno.logout');

    //Password reset routes
});

Route::prefix('exaluno')->group(function (){
    Route::get('/', 'Admin\Users\ExAlunoController@index')->name('exaluno.index');

    //Login routes
    Route::get('/login', 'Auth\Users\ExAlunoLoginController@showLoginForm')->name('exaluno.login');
    Route::post('/login', 'Auth\Users\ExAlunoLoginController@login')->name('exaluno.login.submit');
    Route::get('/logout', 'Auth\Users\ExAlunoLoginController@logout')->name('exaluno.logout');

    //Password reset routes
});
