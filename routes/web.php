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


Auth::routes();

Route::get('/example', [\App\Http\Controllers\Ajax\Santral\MainController::class, 'index'])->name('example');

Route::middleware(['auth'])->namespace('App\\Http\\Controllers')->group(function () {
    Route::get('/', function () {
        return redirect()->route('index');
    });
    Route::get('/index', 'HomeController@index')->name('index');

    Route::prefix('employee')->namespace('Employee')->group(function () {
        Route::get('/', function () {
            return redirect()->route('employee.index');
        });
        Route::get('/index/{company_id?}', 'EmployeeController@index')->name('employee.index');
        Route::get('/show/{employee}/this-month', 'EmployeeController@show')->name('employee.show');
        Route::post('/show/detail', 'EmployeeController@showPost')->name('employee.show.post');
        Route::get('/sync', 'EmployeeController@sync')->name('employee.sync');
    });

    Route::prefix('analysis')->namespace('Analysis')->group(function () {
        Route::get('/employee-call-analysis-create', 'AnalysisController@employeeCallAnalysisCreate')->name('analysis.employee-call-analysis-create');
        Route::post('/employee-call-analysis-store', 'AnalysisController@employeeCallAnalysisStore')->name('analysis.employee-call-analysis-store');

        Route::get('/employee-job-analysis-create', 'AnalysisController@employeeJobAnalysisCreate')->name('analysis.employee-job-analysis-create');
        Route::post('/employee-job-analysis-store', 'AnalysisController@employeeJobAnalysisStore')->name('analysis.employee-job-analysis-store');

        Route::get('/queue-call-analysis-create', 'AnalysisController@queueCallAnalysisCreate')->name('analysis.queue-call-analysis-create');
        Route::post('/queue-call-analysis-store', 'AnalysisController@queueCallAnalysisStore')->name('analysis.queue-call-analysis-store');

        Route::get('/job-analysis-create', 'AnalysisController@jobAnalysisCreate')->name('analysis.job-analysis-create');
        Route::post('/job-analysis-store', 'AnalysisController@jobAnalysisStore')->name('analysis.job-analysis-store');
    });

    Route::prefix('report')->namespace('Report')->group(function () {
        Route::get('/comparison-report', 'Employee\\ReportController@comparisonReport')->name('report.comparison-report');
        Route::post('/comparison-report/show', 'Employee\\ReportController@comparisonReportShow')->name('report.comparison-report.show');

        Route::get('/queue-call-report/{queue_id?}', 'Queue\\ReportController@queueCallReport')->name('report.queue-call-report');

        Route::get('/general-report/this-month', 'General\\ReportController@generalReportThisMonth')->name('report.general-this-month');
        Route::get('/general-report/by-date', 'General\\ReportController@generalReportByDate')->name('report.general.by-date');
    });

    Route::prefix('setting')->namespace('Setting')->group(function () {

        Route::prefix('queues')->namespace('Queue')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.queues.index');
            });
            Route::get('/index', 'QueueController@index')->name('setting.queues.index');
            Route::post('/store', 'QueueController@store')->name('setting.queues.store');
            Route::get('/edit', 'QueueController@edit')->name('setting.queues.edit');
            Route::post('/update', 'QueueController@update')->name('setting.queues.update');
            Route::post('/delete', 'QueueController@delete')->name('setting.queues.delete');
        });

        Route::prefix('competences')->namespace('Competence')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.competences.index');
            });
            Route::get('/index', 'CompetenceController@index')->name('setting.competences.index');
            Route::post('/store', 'CompetenceController@store')->name('setting.competences.store');
            Route::get('/edit', 'CompetenceController@edit')->name('setting.competences.edit');
            Route::post('/update', 'CompetenceController@update')->name('setting.competences.update');
            Route::post('/delete', 'CompetenceController@delete')->name('setting.competences.delete');
        });

    });

});
