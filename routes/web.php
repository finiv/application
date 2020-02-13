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
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController')->except('destroy');
    Route::get('users/delete/{id}', 'UserController@destroy')->name('users.destroy');
    Route::resource('projects', 'ProjectController');
    Route::resource('tasks', 'TaskController')->except(['create']);
    Route::get('task/{id}', 'TaskController@create')->name('tasks.create');
    Route::get('status/{id}', 'TaskController@changeStatus')->name('status');
    Route::get('/download/{task}', 'DownloadController@download')->name('download');
    Route::post('report', 'ReportController@index')->name('report');
});
