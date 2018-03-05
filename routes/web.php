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
Route::get('courses', 'Admin\AdminController@getAllFreeCourses');

Route::group(['middleware'=>'admin', 'prefix'=>'admin'], function(){
   Route::get('dashboard', 'Admin\AdminController@getAdminDashbboard');
   Route::get('logout', 'Admin\AdminController@logout');
   Route::get('course/create', 'Admin\CourseController@create');
   Route::get('courses', 'Admin\CourseController@index');
   Route::post('courses', 'Admin\CourseController@store')->name('upload.course');
   Route::get('course/{id}/edit', 'Admin\CourseController@edit')->name('edit.course');
   Route::put('course/{id}/update', 'Admin\CourseController@update')->name('update.course');
   Route::delete('courses/{id}', 'Admin\CourseController@delete')->name('destroy.course');
   Route::get('/courses/category/create', 'Admin\CourseCategoryController@create');
   Route::post('/upload/course/category', 'Admin\CourseCategoryController@store')->name('upload.course.category');
   Route::get('/courses/categories', 'Admin\CourseCategoryController@index');
   Route::delete('/courses/category/{id}', 'Admin\CourseCategoryController@destroy')->name('destroy.course.category');
   Route::get('module/create', 'Admin\ModuleController@create');
   Route::get('modules', 'Admin\ModuleController@index');
   Route::post('modules', 'Admin\ModuleController@store')->name('upload.module');
   Route::get('module/{id}/edit', 'Admin\ModuleController@edit')->name('edit.module');
   Route::put('module/{id}/update', 'Admin\ModuleController@update')->name('update.module');
   Route::delete('modules/{id}', 'Admin\ModuleController@delete')->name('destroy.module');
   Route::get('topic/create', 'Admin\TopicController@create');
   Route::get('topics', 'Admin\TopicController@index');
   Route::post('topics', 'Admin\TopicController@store')->name('upload.topic');
   Route::get('topic/{id}/edit', 'Admin\TopicController@edit')->name('edit.topic');
   Route::put('topic/{id}/update', 'Admin\TopicController@update')->name('update.topic');
   Route::delete('topics/{id}', 'Admin\TopicController@delete')->name('destroy.topic');
   Route::get('/posts', 'Admin\PostController@index');
   Route::get('/post/{id}/edit', 'Admin\PostController@edit')->name('edit.post');
   Route::put('/post/{id}', 'Admin\PostController@update')->name('update.post');
   Route::delete('/post/{slug}', 'Admin\PostController@destroy')->name('destroy.post');
   Route::get('/posts/category/create', 'Admin\PostCategoryController@create');
   Route::post('/upload/post/category', 'Admin\PostCategoryController@store')->name('upload.post.category');
   Route::get('/posts/categories', 'Admin\PostCategoryController@index');
   Route::delete('/posts/category/{id}', 'Admin\PostCategoryController@destroy')->name('destroy.post.category');
});

