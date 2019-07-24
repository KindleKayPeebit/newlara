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
    return view('mobile-verification');
});
Auth::routes();

Route::get('/admin/dashboard', 'Backend\DashboardController@index')->name('admin.dashboard');
Route::get('/admin/profile', 'Backend\DashboardController@profile')->name('admin.profile');
Route::get('/admin/users', 'Backend\UserController@index')->name('admin.users');

Route::post('send-sms','SmsController@store')->name('send-sms');
Route::post('verify-user','SmsController@verifyContact')->name('verify-user');
