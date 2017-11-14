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


/* Public routes */
Route::get('/', 'PublicController@index');
Route::get('/ordinance', 'PublicController@ordinance');
Route::get('/aboutDiv', 'PublicController@aboutDiv');
Route::get('/about', 'PublicController@about');
Route::get('/monitorAndEval', 'PublicController@monitorAndEval');
Route::get('/resolution', 'PublicController@resolution');
Route::get('/reports', 'PublicController@reports');

// temporary
Route::get('/contactUs', 'PublicController@contactUs');


/* Admin routes */
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'],function () {
    Route::get('/', 'Admin\\DashboardController@index');
    Route::resource('/forms', 'Admin\\FormsController');
    Route::resource('/users', 'Admin\\UsersController'); // Lacking: Validations, Logs
    Route::get('/logs', 'Admin\\LogsController@index'); // Lacking: Pagination, IP Address dynamic
    Route::resource('/ordinances', 'Admin\\OrdinancesController');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
