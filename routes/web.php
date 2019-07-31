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
Route::post('/admin/addprofile', 'Backend\DashboardController@updateProfile')->name('admin.addprofile');

/*front end routes*/

Route::post('send-sms','SmsController@store')->name('send-sms');
Route::post('verify-user','SmsController@verifyContact')->name('verify-user');

/*users routes */

Route::get('/admin/users', 'Backend\UserController@index')->name('admin.users');
Route::get('/admin/edituser/{id}', 'Backend\UserController@editProfile')->name('admin.edituser');;
Route::post('/admin/update/{id}', 'Backend\UserController@update'); 
Route::get('/admin/blockUnblock/{id}', 'Backend\UserController@blockUnblock');  
Route::get('/admin/deleteUser/{id}', 'Backend\UserController@deleteUser'); 
Route::match(['get', 'post'],'/admin/search', 'Backend\UserController@search')->name('admin.search'); 

/*Admin sms routes*/
Route::get('/admin/sms', 'Backend\SmsController@index')->name('admin.sms');
Route::match(['get', 'post'],'/admin/sms/search', 'Backend\SmsController@search')->name('admin.sms.search');
Route::get('/admin/sms/add', 'Backend\SmsController@add')->name('admin.sms.add');
Route::post('/admin/sms/addsms', 'Backend\SmsController@addsms')->name('admin.sms.addsms');
Route::get('/admin/sms/edit/{id}', 'Backend\SmsController@edit')->name('admin.sms.edit');
Route::post('/admin/sms/editsms/{id}', 'Backend\SmsController@editSms')->name('admin.sms.editsms');  
Route::get('/admin/sms/blockUnblock/{id}', 'Backend\SmsController@blockUnblock');  
Route::get('/admin/sms/deleteUser/{id}', 'Backend\SmsController@deleteUser'); 

Route::get('/admin/sendSms', 'Backend\SmsController@sendSms')->name('admin.sendSms'); ;
Route::get('/admin/smsCron', 'Backend\SmsController@smsCron')->name('admin.smsCron'); ;

Route::post('/admin/sms/deleteAll', 'Backend\SmsController@deleteAll')->name('admin.sms.deleteAll'); ;




