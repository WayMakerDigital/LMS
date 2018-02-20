<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Administrator routes

Route::get('admin', 'Admin\AdminController@getAdminLogin');
Route::post('admin/login', 'Admin\AdminController@adminAuth')->name('login.admin');
Route::get('/admin/create', 'Admin\AdminController@createAdmin');
Route::post('/admin/register', 'Admin\AdminController@registerAdmin')->name('new.admin');

Route::group(['middleware'=>'admin', 'prefix'=>'admin'], function(){
   Route::get('dashboard', 'Admin\AdminController@getAdminDashbboard');
   Route::get('logout', 'Admin\AdminController@logout');
   Route::get('course/create', 'Admin\CourseController@create');
   Route::get('courses', 'Admin\CourseController@index');
   Route::post('courses', 'Admin\CourseController@store')->name('upload.course');
   Route::get('courses/{id}/edit', 'Admin\CourseController@edit');
   Route::put('courses', 'Admin\CourseController@update');
   Route::delete('courses', 'Admin\CourseController@delete');
});

