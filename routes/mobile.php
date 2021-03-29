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

Route::namespace('App\\Http\\Controllers\\Mobile')->group(function () {

    Route::get('/', function () {
        return redirect()->route('mobile.dashboard.index');
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return redirect()->route('mobile.dashboard.index');
        });
        Route::get('index', 'MainController@index')->name('mobile.dashboard.index');
    });

});
