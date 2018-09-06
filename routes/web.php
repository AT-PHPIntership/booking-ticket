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

Route::group(['namespace' => 'Home'], function () {
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
});

Route::group(['as' => 'user.', 'namespace' => 'Home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/films', 'FilmController');
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::get('/profile', 'ProfileController@show')->name('profile');
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::get('/booking/step-1', 'BookingController@show')->name('booking');
    Route::get('/booking/step-2', 'BookingController@confirm')->name('confirm');
    Route::resource('films', 'FilmController');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'adminLogin'], function() {
    Route::get('/dashboard', function() {
      return view('admin.pages.home.index');
    })->name('dashboard');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('films', 'FilmController');
    Route::resource('tickets', 'TicketController');
    Route::get('/tickets/film/{id}', 'TicketController@getFilm');
    Route::resource('schedules', 'ScheduleController');
    Route::resource('bookings', 'BookingController');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Auth'], function() {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');
