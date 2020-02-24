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

Route::get('/', 'SystemManagementController@dashboard')->name('system.dashboard');
Route::resource('activities','ActivitiesController');
Route::resource("customers", "CustomersController");
Route::get("system/management", "SystemManagementController@management")->name('system.management');
Route::post("system/management/upload", "SystemManagementController@uplaodFile")->name('system.management.upload');
Route::get("system/management/calendar", "SystemManagementController@showCalendar")->name('system.management.calendar');
Route::get("calendar/getInfos", "SystemManagementController@getInfos")->name('calendar.getInfos');

