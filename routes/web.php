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

Route::get('/', 'HomeController@index');
Route::get('chart', 'HomeController@chart');

Route::post('chart-data', 'AjaxRequestController@chartjsRepsonse');

Route::get('login', function () {
    return redirect('/');
});

Route::get('login/xion', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');


Route::group(['middleware' => 'auth'], function() {

    Route::get('home', 'DashboardController@index');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');



    Route::resources([
        'study' => 'StudyController',
        'details' => 'DetailsController',
        'exam' => 'ExamController',
    ]);

});


