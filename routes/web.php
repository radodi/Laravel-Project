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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/admin', 'AdminController@index')->name('admin');

Route::group(['middleware' => 'auth'],function(){
	Route::group(['middleware' => 'admin'], function(){
		Route::resource("arbiter", 'ArbiterController');
		Route::get('arbiter/{arbiter}/pic', 'ArbiterController@reset_picture')->name('arbiter.reset_picture');
		Route::resource("dancer", 'DancerController');
		Route::get('dancer/{dancer}/pic', 'DancerController@reset_picture')->name('dancer.reset_picture');
		Route::get('result', 'ResultController@index')->name('result');
		Route::get('result/{id}', 'ResultController@checkInvalid')->name('result.validate');
		Route::get('welcome', 'ResultController@sumResult')->name('sumResult');
	});
	Route::group(['middleware' => 'arbiter'], function(){
		Route::get('vote', 'VoteController@index')->name('vote');
		Route::post('vote', 'VoteController@store')->name('vote.store');
	});
=======
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

>>>>>>> origin/master
});

