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

    Route::prefix('dashboard')->namespace('Dashboard')->group(function () {

    });

    Route::prefix('employee')->namespace('Employee')->group(function () {
        Route::get('getEmployeesByCompanyId', 'MainController@getEmployeesByCompanyId')->name('ajax.employees-by-company-id');
        Route::get('getAllEmployeesByCompanyId', 'MainController@getAllEmployeesByCompanyId')->name('ajax.all-employees-by-company-id');

        Route::post('updateQueues', 'MainController@updateQueues')->name('ajax.employee.updateQueues');
        Route::post('updateCompetences', 'MainController@updateCompetences')->name('ajax.employee.updateCompetences');

        Route::post('createCustomPercent', 'MainController@createCustomPercent')->name('ajax.employee.createCustomPercent');
        Route::get('editCustomPercent', 'MainController@editCustomPercent')->name('ajax.employee.editCustomPercent');
        Route::post('updateCustomPercent', 'MainController@updateCustomPercent')->name('ajax.employee.updateCustomPercent');
        Route::post('deleteCustomPercent', 'MainController@deleteCustomPercent')->name('ajax.employee.deleteCustomPercent');
    });

    Route::prefix('general')->namespace('General')->group(function () {
        Route::get('getMonthsByYears', 'MainController@getMonthsByYears')->name('ajax.general.getMonthsByYears');
        Route::get('getDaysByMonths', 'MainController@getDaysByMonths')->name('ajax.general.getDaysByMonths');
    });

    Route::prefix('queue')->namespace('Queue')->group(function () {
        Route::get('getQueuesByCompany', 'MainController@getQueuesByCompany')->name('ajax.queue.getQueuesByCompany');
    });

    Route::prefix('user')->namespace('User')->group(function () {
        Route::post('emailControl', 'MainController@emailControl')->name('ajax.emailControl');
    });

    Route::prefix('role')->namespace('Role')->group(function () {
        Route::post('permissionsUpdate', 'MainController@permissionsUpdate')->name('ajax.role.permissionsUpdate');
    });

    Route::prefix('shift-group')->namespace('ShiftGroup')->group(function () {
        Route::any('employeesUpdate', 'MainController@employeesUpdate')->name('ajax.shift-group.employeesUpdate');
    });

    Route::prefix('monitoring')->namespace('Monitoring')->group(function () {
        Route::any('CallQueues', 'MainController@CallQueues')->name('ajax.monitoring.CallQueues');
        Route::any('GetJobList', 'MainController@GetJobList')->name('ajax.monitoring.GetJobList');
        Route::any('EmployeeAndJobTracking', 'MainController@EmployeeAndJobTracking')->name('ajax.monitoring.EmployeeAndJobTracking');
        Route::any('ShiftEmployeesLastSunday', 'MainController@ShiftEmployeesLastSunday')->name('ajax.monitoring.ShiftEmployeesLastSunday');
        Route::any('Abandon', 'MainController@Abandon')->name('ajax.monitoring.Abandon');
        Route::any('GetPointDay', 'MainController@GetPointDay')->name('ajax.monitoring.GetPointDay');
        Route::any('GetPointWeek', 'MainController@GetPointWeek')->name('ajax.monitoring.GetPointWeek');
        Route::any('GetMonthJobRanking', 'MainController@GetMonthJobRanking')->name('ajax.monitoring.GetMonthJobRanking');
    });

    Route::prefix('application')->namespace('Application')->group(function () {

        Route::prefix('shift')->namespace('Shift')->group(function () {
            Route::post('store', 'MainController@store')->name('ajax.application.shift.store');
            Route::get('edit', 'MainController@edit')->name('ajax.application.shift.edit');
            Route::post('update', 'MainController@update')->name('ajax.application.shift.update');
            Route::post('delete', 'MainController@delete')->name('ajax.application.shift.delete');
            Route::get('getShiftGroupsByCompanyId', 'MainController@getShiftGroupsByCompanyId')->name('ajax.application.shift.getShiftGroupsByCompanyId');
        });

    });

    Route::prefix('project')->namespace('Project')->group(function () {

        Route::prefix('task')->group(function () {
            Route::get('edit', 'TaskController@edit')->name('ajax.project.task.edit');

            Route::post('createChecklistItem', 'TaskController@createChecklistItem')->name('ajax.project.task.createChecklistItem');
            Route::post('updateChecklistItem', 'TaskController@updateChecklistItem')->name('ajax.project.task.updateChecklistItem');
            Route::post('deleteChecklistItem', 'TaskController@deleteChecklistItem')->name('ajax.project.task.deleteChecklistItem');
            Route::post('checkChecklistItem', 'TaskController@checkChecklistItem')->name('ajax.project.task.checkChecklistItem');
            Route::post('uncheckChecklistItem', 'TaskController@uncheckChecklistItem')->name('ajax.project.task.uncheckChecklistItem');

            Route::get('calculateTaskProgress', 'TaskController@calculateTaskProgress')->name('ajax.project.task.calculateTaskProgress');

            Route::post('updateStatus','TaskController@updateStatus')->name('ajax.project.task.updateStatus');
            Route::post('updateMilestone','TaskController@updateMilestone')->name('ajax.project.task.updateMilestone');
        });

        Route::prefix('timesheet')->group(function () {
            Route::get('exists','TimesheetController@exists')->name('ajax.project.timesheet.exists');
        });

        Route::prefix('comment')->group(function () {
            Route::post('create','CommentController@create')->name('ajax.project.comment.create');
            Route::get('edit','CommentController@edit')->name('ajax.project.comment.edit');
            Route::post('update','CommentController@update')->name('ajax.project.comment.update');
            Route::post('delete','CommentController@delete')->name('ajax.project.comment.delete');
        });

        Route::prefix('note')->group(function () {
            Route::post('create','NoteController@create')->name('ajax.project.note.create');
            Route::get('edit','NoteController@edit')->name('ajax.project.note.edit');
            Route::post('update','NoteController@update')->name('ajax.project.note.update');
            Route::post('delete','NoteController@delete')->name('ajax.project.note.delete');
        });

    });

});
