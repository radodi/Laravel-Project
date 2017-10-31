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


// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/', 'HomeController@index');
/*Route::get('/lectures', 'LecturesController@index')->name('lectures');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/contacts', 'ContactsController@index');
Route::get('/user', 'UserController@index');*/

/*Route::resource('user', 'UserController');
Route::resource('course', 'CoursesController');
Route::resource('lecture', 'LecturesController');*/

/*Route::get('user/create', 'UserController@create')->name('add_new_user');
Route::get('user', 'UserController@index')->name('get_all_users');
Route::get('user/{$id}/edit', 'UserController@edit')->name('edit_user_info');
Route::get('user/{$id}/edit', 'UserController@edit')->name('edit_user_info');
//Route::delete('user/{$id}', 'UserController@destroy')->name('dell_user_info');

Route::get('cuorse/create', 'CoursesController@create')->name('add_new_course');
Route::get('course', 'CoursesController@index')->name('get_all_courses');
Route::get('course/{$id}/edit', 'CoursesController@edit')->name('edit_course_info');

Route::get('lecture/create', 'LecturesController@create')->name('add_new_lecture');
Route::get('lecture', 'LecturesController@index')->name('get_all_lectures');
Route::get('lecture/{$id}/edit', 'LecturesController@edit')->name('edit_lecture_info');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'admin'],function(){
	Route::get('/lectures', 'LecturesController@index')->name('lectures');
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::get('/contacts', 'ContactsController@index');
	Route::get('/user', 'UserController@index');
	Route::resource('course', 'CoursesController');
	Route::resource('lecture', 'LecturesController');
	Route::resource('user', 'UserController');
	Route::get('course', 'CoursesController@index')->name('get_all_courses');
	Route::get('lecture', 'LecturesController@index')->name('get_all_lectures');
	Route::get('lecture/create', 'LecturesController@create')->name('add_new_lecture');
	Route::get('user/create', 'UserController@create')->name('add_new_user');
*/


Route::get('/', function () {
    return view('admin.welcome');
//refs/remotes/radodi/master
});
/*Route::group(['middleware'=>'student'],function(){
	Route::get('/lectures', 'LecturesController@index')->name('lectures');
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::get('/contacts', 'ContactsController@index');
	Route::get('/user', 'UserController@index');
	Route::resource('course', 'CoursesController');
	Route::resource('lecture', 'LecturesController');
	Route::resource('user', 'UserController');
	Route::get('course', 'CoursesController@index')->name('get_all_courses');
	Route::get('user', 'UserController@index')->name('get_all_users');
	Route::get('lecture/create', 'LecturesController@create')->name('add_new_lecture');
	Route::get('user/create', 'UserController@create')->name('add_new_user');
});
});
*/