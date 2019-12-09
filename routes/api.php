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
Route::POST('categories/change', 'CategoriesController@change_post')->middleware('token');
Route::POST('categories/remove', 'CategoriesController@remove_post')->middleware('token');
Route::POST('passwords/change', 'PasswordsController@change_post')->middleware('token');
Route::POST('passwords/remove', 'PasswordsController@remove_post')->middleware('token');

Route::GET('ordered', 'PasswordsController@ordered')->middleware('token');


Route::POST('login', 'UsersController@login');
Route::POST('users', 'UsersController@store');

