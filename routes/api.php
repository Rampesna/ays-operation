<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('NetSantral/SetAbandons', [\App\Http\Controllers\Api\Santral\SantralController::class, 'abandons']);

Route::middleware(['TokenControl'])->namespace('App\\Http\\Controllers\\Api')->group(function () {

    Route::prefix('Employee')->namespace('Employee')->group(function () {
        Route::any('Report', 'EmployeeController@report');
    });

    Route::prefix('FoodList')->namespace('FoodList')->group(function () {

        Route::get('FoodList', 'FoodListController@FoodList');

        Route::prefix('FoodListCheck')->namespace('FoodListCheck')->group(function () {
            Route::get('Edit', 'FoodListCheckController@Edit');
        });
    });

});

Route::prefix('v1')->namespace('App\\Http\\Controllers\\Api\\v1')->group(function () {
    Route::prefix('authentication')->namespace('Auth')->group(function () {
        Route::any('login', 'LoginController@login');
    });

    Route::prefix('group')->namespace('Group')->group(function () {
        Route::any('index', 'GroupController@index');
        Route::any('create', 'GroupController@create');
        Route::any('messages', 'GroupController@messages');
    });

    Route::prefix('message')->namespace('Message')->group(function () {
        Route::any('create', 'MessageController@create');
    });
});

