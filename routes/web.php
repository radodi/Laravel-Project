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

/*Route::get('/', function () {
    return view('admin.welcome');
});*/
Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'], function () {

	Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|arbiter','uses'=>'HomeController@allUsers']);

	Route::get('permissions-admin-arbiter',['middleware'=>'check-permission:admin|arbiter','uses'=>'HomeController@adminarbiter']);

	Route::get('permissions-arbiter',['middleware'=>'check-permission:arbiter','uses'=>'HomeController@arbiter']);

});

