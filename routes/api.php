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

Route::prefix('v1')->group(function () {
	Route::post('register', 'UserController@register');
	Route::post('login', 'UserController@login');
	Route::get('users', 'UserController@getAllUsers');
});

Route::group(['middleware'=>'auth:api', 'prefix'=>'v1'], function(){
 Route::get('profile', 'UserController@getUserProfile');
 Route::put('profile/edit', 'UserController@editUserProfile');
 Route::post('logout', 'UserController@logout');
 Route::post('profile/password/edit', 'UserController@changeUserPassword');
});
