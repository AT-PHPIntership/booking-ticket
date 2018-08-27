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
    Route::apiResource('categories', 'CategoryController');
    Route::get('/feature/films', 'FilmController@feature')->name('films.feature');
    Route::get('/new/films', 'FilmController@new')->name('films.new');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/logout', 'LoginController@logout');
    });
});
