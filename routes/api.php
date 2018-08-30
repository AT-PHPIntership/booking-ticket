<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['as' => 'api.','namespace' => 'Api\User'], function () {
    Route::post('/login', 'LoginController@login');
    Route::post('/register', 'RegisterController@register');
    Route::get('/schedule/{schedule}/seat', 'ScheduleController@getSeat')->name('schedule.seat');
    Route::apiResource('categories', 'CategoryController');
    Route::apiResource('films', 'FilmController');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/logout', 'LoginController@logout');
        Route::get('booking', 'BookingController@index');
        Route::get('booking/{booking}', 'BookingController@show');
        Route::post('booking', 'BookingController@store');
        Route::get('/user', 'UserController@show');
        Route::put('/user', 'UserController@update');
    });
});
