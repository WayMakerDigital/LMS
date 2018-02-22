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
	Route::post('register', 'API\UserController@register');
	Route::post('login', 'API\UserController@login');
	Route::get('users', 'API\UserController@getAllUsers');
	Route::get('courses/paid', 'API\CourseController@getAllPaidCourses');
	Route::get('courses/free', 'API\CourseController@getAllFreeCourses');
	Route::get('course/{slug}','API\CourseController@getCourse');
});

Route::group(['middleware'=>'auth:api', 'prefix'=>'v1'], function(){
 Route::get('profile', 'API\UserController@getUserProfile');
 Route::put('profile/edit', 'API\UserController@editUserProfile');
 Route::post('logout', 'API\UserController@logout');
 Route::post('profile/password/edit', 'API\UserController@changeUserPassword');
});
