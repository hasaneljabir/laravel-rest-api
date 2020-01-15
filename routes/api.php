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

// Student
Route::get('student', 'StudentController@index');
Route::post('student', 'StudentController@create');
Route::put('/student/{id}', 'StudentController@update');
Route::delete('/student/{id}', 'StudentController@delete');

// User
Route::get('user', 'api\UserController@index');
Route::post('user', 'api\UserController@create');
Route::put('user/{id}', 'api\UserController@update');
Route::delete('user/{id}', 'api\UserController@delete');
