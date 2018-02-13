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

Route::get('admin', 'AdminController@getAdminLogin');
Route::post('admin/login', 'AdminController@adminAuth')->name('login.admin');
Route::get('/admin/create', 'AdminController@createAdmin');
Route::post('/admin/register', 'AdminController@registerAdmin')->name('new.admin');

Route::group(['middleware'=>['admin']], function(){
   Route::get('admin/dashboard', 'AdminController@getAdminDashbboard');
   Route::get('admin/logout', 'AdminController@logout');
});