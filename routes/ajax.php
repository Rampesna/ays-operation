<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::namespace('App\\Http\\Controllers\\Ajax')->group(function () {

    Route::prefix('employee')->namespace('Employee')->group(function () {
        Route::get('getEmployeesByCompanyId','MainController@getEmployeesByCompanyId')->name('ajax.employees-by-company-id');

        Route::post('updateQueues', 'MainController@updateQueues')->name('ajax.employee.updateQueues');
        Route::post('updateCompetences', 'MainController@updateCompetences')->name('ajax.employee.updateCompetences');
    });

});
