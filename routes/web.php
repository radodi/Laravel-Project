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
    return view('admin.welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function(){
	Route::resource("arbiter", 'ArbiterController');
	Route::get('arbiter/{arbiter}/pic', 'ArbiterController@reset_picture')->name('arbiter.reset_picture');
	Route::resource("dancer", 'DancerController');
	Route::get('dancer/{dancer}/pic', 'DancerController@reset_picture')->name('dancer.reset_picture');
	Route::get('vote', 'VoteController@index')->name('vote');
	Route::post('vote', 'VoteController@store')->name('vote.store');
});
