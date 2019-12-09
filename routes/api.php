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

Route::apiResource('users', 'UsersController')->middleware('token');
Route::apiResource('categories', 'CategoriesController')->middleware('token');
Route::apiResource('passwords', 'PasswordsController')->middleware('token');

Route::POST('login', 'UsersController@login');
Route::POST('users', 'UsersController@store');
