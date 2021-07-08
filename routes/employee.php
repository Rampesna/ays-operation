<?php

use App\Http\Api\OperationApi\OperationApi;
use App\Models\Queue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('employee/monitoring', function () {
    return view('pages.tv.sections.section2', [
        'token' => (new OperationApi)->Login()
    ]);
})->name('employee.monitoring');
Route::get('employee/queues', function () {
    return view('pages.tv.sections.section1', [
        'queues' => Queue::where('company_id', 1)->get()
    ]);
})->name('employee.queues');
Route::get('/login/employee', [\App\Http\Controllers\Auth\LoginController::class, 'employeeLoginForm'])->name('employee-panel.login.form');
Route::post('/login/employee', [\App\Http\Controllers\Auth\LoginController::class, 'employeeLogin'])->name('employee-panel.login');
Route::middleware(['auth:employee'])->prefix('employees')->namespace('App\\Http\\Controllers\\EmployeePanel')->group(function () {
    Route::get('/', function () {
        return redirect()->route('employee-panel.index');
    });
    Route::get('index', 'MainController@index')->name('employee-panel.index');

    Route::prefix('profile')->namespace('Profile')->group(function () {
        Route::get('/', function () {
            return redirect()->route('employee-panel.profile.index');
        });
        Route::get('index', 'ProfileController@index')->name('employee-panel.profile.index');
        Route::post('update', 'ProfileController@update')->name('employee-panel.profile.update');
        Route::post('changePassword', 'ProfileController@changePassword')->name('employee-panel.profile.changePassword');
    });

    Route::prefix('permit')->namespace('Permit')->group(function () {
        Route::post('create', 'PermitController@create')->name('employee-panel.permit.create');
    });

    Route::prefix('overtime')->namespace('Overtime')->group(function () {
        Route::post('create', 'OvertimeController@create')->name('employee-panel.overtime.create');
    });

    Route::prefix('project')->namespace('Project')->group(function () {
        Route::get('/', function () {
            return redirect()->route('employee-panel.project.index');
        });
        Route::get('index', 'ProjectController@index')->name('employee-panel.project.index');
        Route::get('{project}/{tab}/{sub?}', 'ProjectController@show')->name('employee-panel.project.show');
        Route::get('{project}/tickets/ticket/{ticket}', 'ProjectController@ticket')->name('employee-panel.project.tickets.ticket');

        Route::prefix('timesheet')->group(function () {
            Route::post('start', 'TimesheetController@start')->name('employee-panel.project.timesheet.start');
            Route::post('stop', 'TimesheetController@stop')->name('employee-panel.project.timesheet.stop');
        });

        Route::prefix('file')->group(function () {
            Route::post('create', 'FileController@create')->name('employee-panel.project.file.create');
        });

        Route::prefix('ticket')->group(function () {
            Route::post('create', 'TicketController@create')->name('employee-panel.project.ticket.create');
        });

        Route::prefix('ticket-message')->group(function () {
            Route::post('create', 'TicketMessageController@create')->name('employee-panel.project.ticket.ticket-message.create');
        });
    });
});
