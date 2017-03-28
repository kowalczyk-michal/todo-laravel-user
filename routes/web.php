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

Route::group([

    'middleware' => 'roles',
    'roles' => 'User'

], function() {

    Route::get('todo', [
        'uses' => 'TodoController@index',
        'as' => 'todo.index'
    ]);

    Route::get('todo/show', [
        'uses' => 'TodoController@show',
        'as' => 'todo.show'
    ]);

    Route::get('todo/create', [
        'uses' => 'TodoController@create',
        'as' => 'todo.create'
    ]);

    Route::post('todo/store', [
        'uses' => 'TodoController@store',
        'as' => 'todo.store'
    ]);

    Route::get('todo/edit/{task}', [
        'uses' => 'TodoController@edit',
        'as' => 'todo.edit'
    ]);

    Route::put('todo/{task}', [
        'uses' => 'TodoController@update',
        'as' => 'todo.update'
    ]);

    Route::get('todo/{task}', [
        'uses' => 'TodoController@completed',
        'as' => 'todo.completed'
    ]);

    Route::delete('todo/{task}', [
        'uses' => 'TodoController@destroy',
        'as' => 'todo.delete'
    ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index');
