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

Route::get('admin_search', 'Api\Admin\SearchController@search')->name('api.admin_search');

Route::group(['as' => 'api.','namespace' => 'Api\User'], function () {
    Route::post('/login', 'LoginController@login');
    Route::post('/register', 'RegisterController@register');
    Route::get('/schedule/{schedule}/seat', 'ScheduleController@getSeat');
    Route::apiResource('categories', 'CategoryController');
    Route::apiResource('films', 'FilmController');
    Route::get('search', 'FilmController@search')->name('search');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::apiResource('booking', 'BookingController');
        Route::post('/logout', 'LoginController@logout');
        Route::get('/user', 'UserController@show');
        Route::put('/user', 'UserController@update');
    });
});
