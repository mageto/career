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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/add-task', 'TaskController@add_task')->middleware('auth');
Route::post('/update-task/{id}', 'TaskController@update_task')->middleware('auth');
Route::get('/view-task/{id}', 'TaskController@view_task')->middleware('auth');
Route::get('/delete-task/{id}', 'TaskController@delete_task')->middleware('auth');
