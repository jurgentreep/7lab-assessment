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
Route::post('/auth', 'AuthenticateController@authenticate');
Route::get('/user', 'AuthenticateController@getAuthenticatedUser')->middleware('jwt.auth');
Route::get('/profile', 'ProfileController@index')->middleware('jwt.auth');
Route::post('/profile', 'ProfileController@update')->middleware('jwt.auth');
