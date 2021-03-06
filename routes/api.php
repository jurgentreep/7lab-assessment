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
Route::post('auth', 'AuthenticateController@authenticate');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('profile', 'ProfileController@index');

    Route::put('profile', 'ProfileController@update');

    Route::resource('product', 'ProductController');
    Route::get('product/{product}/stock', 'ProductController@stock');
});
