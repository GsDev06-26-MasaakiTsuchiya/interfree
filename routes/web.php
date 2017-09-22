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

Auth::routes();//これなんだ

// Route::group(['prefix' => 'interviewee'], function() {
//   Route::get('login', 'Interviewee\Auth\LoginController@showLoginForm')->name('interviewee.login');
//   Route::post('login', 'Interviewee\Auth\LoginController@login')->name('interviewee.login');
//   Route::get('logout', 'Interviewee\Auth\LoginController@logout')->name('interviewee.logout');
  
//   Route::get('register', 'Interviewee\Auth\RegisterController@showRegisterForm')->name('interviewee.register');
//   Route::post('register', 'Interviewee\Auth\RegisterController@register')->name('interviewee.register');
 
//   Route::get('home', 'Interviewee\HomeController@index')->name('interviewee.home');
// });

// Route::group(['prefix' => 'interviewee','middleware' => 'auth:interviewee'], function() {
//   Route::get('logout', 'Interviewee\Auth\LoginController@logout')->name('interviewee.logout');
//   Route::get('home', 'Interviewee\HomeController@index')->name('interviewee.home');
// });

// Route::group(['prefix' => 'interviewee','middleware' => 'guest:interviewee'], function() {
//   Route::get('login', 'Interviewee\Auth\LoginController@showLoginForm')->name('interviewee.login');
//   Route::post('login', 'Interviewee\Auth\LoginController@login')->name('interviewee.login');
//   Route::get('register', 'Interviewee\Auth\RegisterController@showRegisterForm')->name('interviewee.register');
//   Route::post('register', 'Interviewee\Auth\RegisterController@register')->name('interviewee.register');
// });

// Route::group(['middleware' => 'guest'], function() {
//   Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//   Route::post('login', 'Auth\LoginController@login')->name('login');
//   Route::get('register', 'Auth\RegisterController@showRegisterForm')->name('register');
//   Route::post('register', 'Auth\RegisterController@register')->name('register');
// });

// Route::group(['middleware' => 'auth:users'], function() {
  
// });
Route::resource('users', 'UsersController');
Route::resource('interviewees', 'IntervieweesController');
Route::resource('corps', 'CorpsController');
Route::resource('interviews', 'InterviewsController');

Route::group(['prefix' => 'interviews/setting'], function() {
  Route::get('/style_select/interviewee/{interviewee}/interview_type/{interview_type}', 'InterviewsController@style_select')->name('style_select');
  // Route::get('/style_select/{interviewee}', 'InterviewsController@style_select')->name('style_select');
  Route::get('/user_select/{intervivew_style}', 'InterviewsController@user_select')->name('user_select');
  Route::post('/interview_time_select/', 'InterviewsController@interview_time_select')->name('interview_time_select');
  Route::post('/interview_setting_confirm/', 'InterviewsController@interview_setting_confirm')->name('interview_setting_confirm');
  Route::post('/interview_setting_store/', 'InterviewsController@interview_setting_store')->name('interview_setting_store');
});

Route::resource('interviews','InterviewsController');
Route::resource('user_lists', 'UserListsController');

Route::get('/home', 'HomeController@index')->name('home');
