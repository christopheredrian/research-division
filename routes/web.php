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

Route::get('/aboutDiv', 'PublicController@aboutDiv');
Route::get('/about', 'PublicController@about');

//Route::get('/monitorAndEval', 'PublicController@monitorAndEval');

/* M and E */
Route::get('/ordinances', 'PublicController@monitorAndEvalOrdinances'); /* used in monitoring and evaluation */
Route::get('/resolutions', 'PublicController@monitorAndEvalResolutions'); /* used in monitoring and evaluation */
Route::get('/monitorAndEval/ordinances', 'PublicController@ordinance');
Route::get('/monitorAndEval/resolutions', 'PublicController@resolutions');
/* End M and E*/

/* R and R */
Route::get('/r&r/resolutions', 'PublicController@researchAndRecordsResolution');
Route::get('/r&r/ordinances', 'PublicController@researchAndRecordsOrdinance');
/* End R and R */

Route::get('/public/showOrdinance/{id}', 'PublicController@showOrdinance');
Route::get('/public/showOrdinanceQuestionnaire/{id}', 'PublicController@showOrdinanceQuestionnaire');
Route::get('/public/showOrdinanceQuestionnaire/{id}/required', 'PublicController@showRequiredOrdinanceQuestionnaire');
Route::post('/submitOrdinanceAnswers/{id}', 'PublicController@submitOrdinanceAnswers');

Route::get('/public/showResolution/{id}', 'PublicController@showResolution');
Route::get('/public/showResolutionQuestionnaire/{id}', 'PublicController@showResolutionQuestionnaire');
Route::get('/public/showResolutionQuestionnaire/{id}/required', 'PublicController@showRequiredResolutionQuestionnaire');

//Route::get('/reports', 'PublicController@reports');
Route::get('/page/{id}', 'PublicController@page');
Route::post('/suggestions/{id}', 'PublicController@storeSuggestion');
Route::get('/contactUs', 'PublicController@contactUs');

Route::get('/downloadPDF/{directory}/{file}', 'PublicController@downloadPDF');
Route::get('/deletePDF/{directory}/{file}', 'PublicController@deletePDF');
Route::get('/search', 'SearchController@index');

/* Admin routes */
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {

    Route::get('/search', 'SearchController@index');
    Route::get('/', 'Admin\\DashboardController@index');
    Route::get('/show/{id}', 'Admin\\UsersController@show');
    Route::post('/update/{id}', 'Admin\\UsersController@update');
    Route::get('/profile/edit', 'Admin\\UsersController@profEdit');
    Route::get('/profile', 'Admin\\UsersController@profile');
    Route::delete('/profile/deleteImage', 'Admin\\UsersController@deleteImage');


    Route::get('change-password', 'Admin\\UsersController@changePassword');
    Route::post('update-password', 'Admin\\UsersController@updatePassword');

    /** Monitoring and Evaluation */
    Route::group(['middleware' => 'role:me,superadmin,admin'], function () {

        Route::group(['prefix' => 'forms'], function () {
            Route::get('ordinances', 'Admin\\FormsController@ordinancesIndex');
            Route::get('resolutions', 'Admin\\FormsController@resolutionsIndex');
        });
        Route::resource('forms', 'Admin\\FormsController');
        Route::post('/acceptResponses/{id}', 'Admin\\FormsController@acceptResponses');
        Route::post('/declineResponses/{id}', 'Admin\\FormsController@declineResponses');
        Route::post('/acceptSuggestions/{id}/{flag}', 'Admin\\FormsController@acceptSuggestions');
        Route::post('/declineSuggestions/{id}/{flag}', 'Admin\\FormsController@declineSuggestions');
        Route::group(['prefix' => 'result'], function () {
            Route::get('download/{id}', 'Admin\\ResultController@downloadExcel');
            Route::get('resolutions', 'Admin\\FormsController@resolutions');
        });
        Route::resource('result', 'Admin\\ResultController');
        Route::get('/showComments/{id}/{flag}', 'Admin\\ResultController@showComments');
        Route::post('/updateAnswer', 'Admin\\ResultController@updateAnswer');
        Route::post('/updateComment', 'Admin\\ResultController@updateComment');
        Route::delete('/deleteComment/{id}', 'Admin\\ResultController@deleteComment');
        Route::get('downloadComments/{id}/{flag}', 'Admin\\ResultController@downloadCommentsExcel');

        /** Status and Update Reports */
        Route::get('/ordinances/{id}/upload-status-report', 'Admin\\OrdinancesController@statusReportCreate');
        Route::get('/ordinances/{id}/upload-update-report', 'Admin\\OrdinancesController@updateReportCreate');
        Route::get('/resolutions/{id}/upload-status-report', 'Admin\\ResolutionsController@statusReportCreate');
        Route::get('/resolutions/{id}/upload-update-report', 'Admin\\ResolutionsController@updateReportCreate');

        Route::post('/ordinance-upload-status-report',
            'Admin\\OrdinancesController@storeStatusReport')->name('ordinanceStoreStatusReport');
        Route::post('/ordinance-upload-update-report',
            'Admin\\OrdinancesController@storeUpdateReport')->name('ordinanceStoreUpdateReport');
        Route::post('/resolution-upload-status-report',
            'Admin\\ResolutionsController@storeStatusReport')->name('resolutionStoreStatusReport');
        Route::post('/resolution-pload-update-report',
            'Admin\\ResolutionsController@storeUpdateReport')->name('resolutionStoreUpdateReport');

        /**  Print */
        Route::get('/previewOrdinance/{id}', 'Admin\\OrdinancesController@preview');
        Route::get('/previewResolution/{id}', 'Admin\\ResolutionsController@preview');


    });

    /** END --- Monitoring and Evaluation */

    /** Research and Records */
    Route::resources([
        'ordinances' => 'Admin\\OrdinancesController',
        'resolutions' => 'Admin\\ResolutionsController',
    ]);
    /** END --- Research and Records */

    // Routes ONLY for Admin and superadmin
    Route::group(['middleware' => 'role:superadmin,admin'], function () {
        Route::resource('pages', 'Admin\\PagesController');
        Route::get('/reset-password/{user_id}/', 'Admin\\UsersController@resetPassword');
        Route::get('/logs', 'Admin\\LogsController@index');
    });

    // Routes ONLY for superadmin
    Route::group(['middleware' => 'role:superadmin'], function () {
        Route::resource('users', 'Admin\\UsersController');
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    /** Reports */
    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::post('/reports', 'ReportsController@query')->name('postreports');
    Route::get('/downloadReport', 'ReportsController@downloadReport')->name('downloadReport');
    /** END --- Reports*/
});