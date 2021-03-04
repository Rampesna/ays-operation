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
        Route::get('usersByCompany', 'MainController@usersByCompany')->name('ajax.user.usersByCompany');
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

//        Route::post('');

        Route::get('taskStatuses', 'ProjectController@taskStatuses')->name('ajax.project.taskStatuses');

        Route::prefix('task')->group(function () {
            Route::get('create', 'TaskController@create')->name('ajax.project.task.create');
            Route::get('edit', 'TaskController@edit')->name('ajax.project.task.edit');
            Route::post('delete', 'TaskController@delete')->name('ajax.project.task.delete');

            Route::post('createChecklistItem', 'TaskController@createChecklistItem')->name('ajax.project.task.createChecklistItem');
            Route::post('updateChecklistItem', 'TaskController@updateChecklistItem')->name('ajax.project.task.updateChecklistItem');
            Route::post('deleteChecklistItem', 'TaskController@deleteChecklistItem')->name('ajax.project.task.deleteChecklistItem');
            Route::post('checkChecklistItem', 'TaskController@checkChecklistItem')->name('ajax.project.task.checkChecklistItem');
            Route::post('uncheckChecklistItem', 'TaskController@uncheckChecklistItem')->name('ajax.project.task.uncheckChecklistItem');

            Route::get('calculateTaskProgress', 'TaskController@calculateTaskProgress')->name('ajax.project.task.calculateTaskProgress');

            Route::post('updateStatus', 'TaskController@updateStatus')->name('ajax.project.task.updateStatus');
            Route::post('updateMilestone', 'TaskController@updateMilestone')->name('ajax.project.task.updateMilestone');
            Route::post('updatePriority', 'TaskController@updatePriority')->name('ajax.project.task.updatePriority');
            Route::post('updateDescription', 'TaskController@updateDescription')->name('ajax.project.task.updateDescription');
            Route::post('updateEmployee', 'TaskController@updateEmployee')->name('ajax.project.task.updateEmployee');

            Route::prefix('task-status')->group(function () {
                Route::post('create', 'TaskStatusController@create')->name('ajax.project.task-status.create');
                Route::post('delete', 'TaskStatusController@delete')->name('ajax.project.task-status.delete');

                Route::post('name-update', 'TaskStatusController@nameUpdate')->name('ajax.project.task-status.name-update');
                Route::post('order-update', 'TaskStatusController@orderUpdate')->name('ajax.project.task-status.order-update');

                Route::get('taskCount', 'TaskStatusController@taskCount')->name('ajax.project.task-status.taskCount');
            });
        });

        Route::prefix('timesheet')->group(function () {
            Route::get('exists', 'TimesheetController@exists')->name('ajax.project.timesheet.exists');
            Route::get('getOpenTimesheets', 'TimesheetController@getOpenTimesheets')->name('ajax.project.timesheet.getOpenTimesheets');
        });

        Route::prefix('comment')->group(function () {
            Route::post('create', 'CommentController@create')->name('ajax.project.comment.create');
            Route::get('edit', 'CommentController@edit')->name('ajax.project.comment.edit');
            Route::post('update', 'CommentController@update')->name('ajax.project.comment.update');
            Route::post('delete', 'CommentController@delete')->name('ajax.project.comment.delete');
        });

        Route::prefix('note')->group(function () {
            Route::post('create', 'NoteController@create')->name('ajax.project.note.create');
            Route::get('edit', 'NoteController@edit')->name('ajax.project.note.edit');
            Route::post('update', 'NoteController@update')->name('ajax.project.note.update');
            Route::post('delete', 'NoteController@delete')->name('ajax.project.note.delete');
        });

        Route::prefix('ticket')->group(function () {

        });

    });

    Route::prefix('inventory')->namespace('Inventory')->group(function () {
        Route::prefix('device')->group(function () {
            Route::get('show', 'DeviceController@show')->name('ajax.inventory.device.show');
            Route::post('create', 'DeviceController@create')->name('ajax.inventory.device.create');
            Route::post('update', 'DeviceController@update')->name('ajax.inventory.device.update');
            Route::post('updateEmployee', 'DeviceController@updateEmployee')->name('ajax.inventory.device.updateEmployee');
            Route::post('removeEmployee', 'DeviceController@removeEmployee')->name('ajax.inventory.device.removeEmployee');
        });

        Route::prefix('device-action')->group(function () {

        });
    });

    Route::prefix('calendar')->namespace('Calendar')->group(function () {
        Route::prefix('meeting')->group(function () {
            Route::post('create', 'MeetingController@create')->name('ajax.calendar.meeting.create');
            Route::get('show', 'MeetingController@show')->name('ajax.calendar.meeting.show');
            Route::post('update', 'MeetingController@update')->name('ajax.calendar.meeting.update');
            Route::delete('delete', 'MeetingController@delete')->name('ajax.calendar.meeting.delete');
        });

        Route::prefix('calendarNote')->group(function () {
            Route::post('create', 'CalendarNoteController@create')->name('ajax.calendar.calendarNote.create');
            Route::get('show', 'CalendarNoteController@show')->name('ajax.calendar.calendarNote.show');
            Route::post('update', 'CalendarNoteController@update')->name('ajax.calendar.calendarNote.update');
            Route::delete('delete', 'CalendarNoteController@delete')->name('ajax.calendar.calendarNote.delete');
        });

        Route::prefix('calendarInformation')->group(function () {
            Route::post('create', 'CalendarInformationController@create')->name('ajax.calendar.calendarInformation.create');
            Route::get('show', 'CalendarInformationController@show')->name('ajax.calendar.calendarInformation.show');
            Route::post('update', 'CalendarInformationController@update')->name('ajax.calendar.calendarInformation.update');
            Route::delete('delete', 'CalendarInformationController@delete')->name('ajax.calendar.calendarInformation.delete');
        });
    });

});
