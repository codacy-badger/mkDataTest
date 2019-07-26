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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('users', 'UsersController@index')->name('users.list');
    Route::get('users/edit/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('users/save-edit', 'UsersController@saveEdit')->name('users.saveEdit');
    Route::post('users/alter-status', 'UsersController@alterStatus')->name('users.alterStatus');
});
