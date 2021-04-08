<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/test', [\App\Http\Controllers\HomeController::class, 'index'])->name('test');

Auth::routes();

Route::get('/login/employee', [\App\Http\Controllers\Auth\LoginController::class, 'employeeLoginForm'])->name('employee-panel.login.form');
Route::post('/login/employee', [\App\Http\Controllers\Auth\LoginController::class, 'employeeLogin'])->name('employee-panel.login');

Route::middleware(['auth'])->namespace('App\\Http\\Controllers\\UserPanel')->group(function () {
    Route::get('/', function () {
        return redirect()->route('index');
    });
    Route::get('/index/{company_id?}', 'MainController@index')->name('index')->middleware('Authority:1');

    Route::prefix('profile')->namespace('Profile')->group(function () {
        Route::get('/', function () {
            return redirect()->route('profile.index');
        });
        Route::get('index', 'ProfileController@index')->name('profile.index');
        Route::post('changePassword', 'ProfileController@changePassword')->name('profile.changePassword');
    });

    Route::prefix('employee')->namespace('Employee')->group(function () {
        Route::get('/', function () {
            return redirect()->route('employee.index');
        });
        Route::get('/index/{company_id?}', 'EmployeeController@index')->name('employee.index')->middleware('Authority:2');
        Route::get('/show/{employee}/{tab?}', 'EmployeeController@show')->name('employee.show')->middleware('Authority:28');
        Route::post('/update', 'EmployeeController@update')->name('employee.update')->middleware('Authority:28');
        Route::get('/index/by-priority/{priority}', 'EmployeeController@byPriority')->name('employee.index.by-priority')->middleware('Authority:2');
        Route::get('/report/{employee}/this-month', 'EmployeeController@report')->name('employee.report')->middleware('Authority:12');
        Route::post('/report/detail', 'EmployeeController@reportByDate')->name('employee.report.by-date')->middleware('Authority:12');
        Route::get('/priorities/edit/{employee}', 'EmployeeController@editPriorities')->name('employee.priorities.edit')->middleware('Authority:2');
        Route::post('/priorities/update', 'EmployeeController@updatePriorities')->name('employee.priorities.update')->middleware('Authority:2');
        Route::get('/sync', 'EmployeeController@sync')->name('employee.sync')->middleware('Authority:100');
    });

    Route::prefix('analysis')->namespace('Analysis')->group(function () {
        Route::get('/employee-call-analysis-create', 'AnalysisController@employeeCallAnalysisCreate')->name('analysis.employee-call-analysis-create')->middleware('Authority:4');
        Route::post('/employee-call-analysis-store', 'AnalysisController@employeeCallAnalysisStore')->name('analysis.employee-call-analysis-store')->middleware('Authority:4');

        Route::get('/employee-job-analysis-create', 'AnalysisController@employeeJobAnalysisCreate')->name('analysis.employee-job-analysis-create')->middleware('Authority:5');
        Route::post('/employee-job-analysis-store', 'AnalysisController@employeeJobAnalysisStore')->name('analysis.employee-job-analysis-store')->middleware('Authority:5');

        Route::get('/queue-call-analysis-create', 'AnalysisController@queueCallAnalysisCreate')->name('analysis.queue-call-analysis-create')->middleware('Authority:6');
        Route::post('/queue-call-analysis-store', 'AnalysisController@queueCallAnalysisStore')->name('analysis.queue-call-analysis-store')->middleware('Authority:6');

        Route::get('/job-analysis-create', 'AnalysisController@jobAnalysisCreate')->name('analysis.job-analysis-create')->middleware('Authority:7');
        Route::post('/job-analysis-store', 'AnalysisController@jobAnalysisStore')->name('analysis.job-analysis-store')->middleware('Authority:7');
    });

    Route::prefix('report')->namespace('Report')->group(function () {
        Route::get('/comparison-report', 'Employee\\ReportController@comparisonReport')->name('report.comparison-report')->middleware('Authority:8');
        Route::post('/comparison-report/show', 'Employee\\ReportController@comparisonReportShow')->name('report.comparison-report.show')->middleware('Authority:8');

        Route::get('/queue-call-report/create', 'Queue\\ReportController@queueCallReportCreate')->name('report.queue-call-report.create')->middleware('Authority:9');
        Route::post('/queue-call-report', 'Queue\\ReportController@queueCallReport')->name('report.queue-call-report')->middleware('Authority:9');

        Route::get('/general-report/create', 'General\\ReportController@generalReportCreate')->name('report.general.create')->middleware('Authority:10');
        Route::post('/general-report', 'General\\ReportController@generalReport')->name('report.general')->middleware('Authority:10');

        Route::get('/employees', 'Employee\\ReportController@employees')->name('report.employees')->middleware('Authority:11');
        Route::post('/employees/by-company', 'Employee\\ReportController@employeesByCompany')->name('report.employees.by-company')->middleware('Authority:11');

        Route::get('performance', 'Performance\\ReportController@create')->name('report.performance.create');
        Route::post('performance/report', 'Performance\\ReportController@report')->name('report.performance.report');

        Route::prefix('job')->namespace('Job')->group(function () {
            Route::get('/', function () {
                return redirect()->route('report.job.index');
            });
            Route::get('/index', 'JobReportController@index')->name('report.job.index');
            Route::post('/show', 'JobReportController@show')->name('report.job.show');
        });

        Route::prefix('custom')->namespace('Custom')->group(function () {
            Route::get('/', function () {
                return redirect()->route('report.custom.index');
            });
            Route::get('/index', 'CustomReportController@index')->name('report.custom.index');
            Route::post('/show', 'CustomReportController@show')->name('report.custom.show');
        });

    });

    Route::prefix('integration')->namespace('Integration')->group(function () {

        Route::prefix('excel')->group(function () {
            Route::get('/', function () {
                return redirect()->route('integration.excel.index');
            });
            Route::get('/index', 'ExcelController@index')->name('integration.excel.index');
            Route::post('/store', 'ExcelController@store')->name('integration.excel.store');
        });

        Route::prefix('call-data-scanning')->group(function () {
            Route::get('/', function () {
                return redirect()->route('integration.call-data-scanning.index');
            });
            Route::get('/index', 'ExcelDataScanningController@index')->name('integration.call-data-scanning.index');
            Route::post('/store', 'ExcelDataScanningController@store')->name('integration.call-data-scanning.store');
        });

        Route::prefix('with-id')->group(function () {
            Route::get('/', function () {
                return redirect()->route('integration.with-id.index');
            });
            Route::get('/index', 'WithIdController@index')->name('integration.with-id.index');
            Route::post('/store', 'WithIdController@store')->name('integration.with-id.store');
        });

        Route::get('re-activate-suspended-jobs', 'IntegrationController@reActivateSuspendedJobs')->name('integration.re-activate-suspended-jobs');

        Route::prefix('activity')->group(function () {
            Route::get('/', function () {
                return redirect()->route('integration.activity-delete');
            });
            Route::get('/index', 'ActivityController@deleteActivity')->name('integration.activity-delete');
            Route::post('/delete', 'ActivityController@delete')->name('integration.activity.delete');
        });

        Route::prefix('excel-data')->group(function () {
            Route::get('/', function () {
                return redirect()->route('integration.excel-data.index');
            });
            Route::get('/index', 'ExcelDataController@index')->name('integration.excel-data.index');
            Route::post('/store', 'ExcelDataController@store')->name('integration.excel-data.store');
        });
    });

    Route::prefix('tv')->namespace('Monitoring')->middleware('Authority:21')->group(function () {
        Route::get('/', function () {
            return redirect()->route('tv.index');
        });
        Route::get('/index', 'TelevisionController@Index')->name('tv.index');
        Route::post('/store', 'TelevisionController@Store')->name('tv.store');

        Route::get('/abandons', 'TelevisionController@Abandons')->name('dashboard.abandons');

        Route::prefix('sections')->group(function () {
            Route::get('section/1', 'TelevisionController@Section1')->name('tv.section.1');
            Route::get('section/2', 'TelevisionController@Section2')->name('tv.section.2');
            Route::get('section/3', 'TelevisionController@Section3')->name('tv.section.3');
            Route::get('section/4', 'TelevisionController@Section4')->name('tv.section.4');
            Route::get('section/5', 'TelevisionController@Section5')->name('tv.section.5');
        });
    });

    Route::prefix('project-management')->namespace('Project')->middleware(['Authority:32'])->group(function () {
        Route::prefix('project')->namespace('Project')->group(function () {
            Route::get('/', function () {
                return redirect()->route('');
            });
            Route::get('index', 'ProjectController@index')->name('project.project.index');
            Route::get('{project}/{tab}/{sub?}', 'ProjectController@show')->name('project.project.show');
            Route::get('{project}/timeline/by/{timesheetId}', 'ProjectController@timeline')->name('project.project.timeline');
            Route::get('{project}/tickets/ticket/{ticket}', 'ProjectController@ticket')->name('project.project.tickets.ticket');
            Route::post('delete', 'ProjectController@delete')->name('project.project.delete');

            Route::post('employees/update', 'ProjectController@employeesUpdate')->name('project.project.employees.update');
            Route::post('create', 'ProjectController@create')->name('project.project.create');
            Route::post('update', 'ProjectController@update')->name('project.project.update');

            Route::prefix('task')->group(function () {
                Route::post('create', 'TaskController@create')->name('project.project.task.create');
            });

            Route::prefix('milestone')->group(function () {
                Route::post('create', 'MilestoneController@create')->name('project.project.milestone.create');
                Route::post('delete', 'MilestoneController@delete')->name('project.project.milestone.delete');
            });

            Route::prefix('timesheet')->group(function () {
                Route::post('start', 'TimesheetController@start')->name('project.project.timesheet.start');
                Route::post('stop', 'TimesheetController@stop')->name('project.project.timesheet.stop');
            });

            Route::prefix('file')->group(function () {
                Route::post('create', 'FileController@create')->name('project.project.file.create')->withoutMiddleware('Authority:32');
                Route::post('delete', 'FileController@delete')->name('project.project.file.delete')->withoutMiddleware('Authority:32');
            });

            Route::prefix('ticket-message')->group(function () {
                Route::post('create', 'TicketMessageController@create')->name('project.project.ticket.ticket-message.create');
            });

            Route::prefix('ticket')->group(function () {
                Route::post('setCompleted', 'TicketController@setCompleted')->name('project.project.ticket.setCompleted');
            });
        });
    });

    Route::prefix('inventory')->namespace('Inventory')->middleware(['Authority:44'])->group(function () {
        Route::get('/', function () {
            return redirect()->route('inventory.index');
        });
        Route::get('/index', 'InventoryController@index')->name('inventory.index');
        Route::get('/devices', 'InventoryController@devices')->name('inventory.devices');
        Route::get('/devices/report', 'InventoryController@report')->name('inventory.devices.report');
        Route::post('/devices/report/show', 'InventoryController@reportShow')->name('inventory.devices.report.show');
        Route::get('/devices/report/show/{id}/detail', 'InventoryController@showDetail')->name('inventory.devices.report.show.detail');
    });

    Route::prefix('calendar')->namespace('Calendar')->group(function () {
        Route::get('/', function () {
            return redirect()->route('calendar.index');
        });
        Route::get('index', 'CalendarController@index')->name('calendar.index');
    });

    Route::prefix('exams')->namespace('Exam')->group(function () {
        Route::get('/', function () {
            return redirect()->route('exams.index');
        });
        Route::get('/index', 'ExamController@Index')->name('exams.index');
        Route::get('/{id?}/employees', 'ExamController@getExamEmployees')->name('exams.getExamEmployees');
        Route::get('/{id?}/{exam?}/{name?}/results', 'ExamController@getExamResults')->name('exams.getExamResults');
        Route::get('exam/{id}/results', 'ExamController@getResults')->name('exams.getResults');
        Route::post('setExamResults', 'ExamController@setExamResults')->name('exams.setExamResults');
        Route::get('/create', 'ExamController@Create')->name('exams.create');
        Route::post('/store', 'ExamController@Create')->name('exams.store');
        Route::get('/{id}/edit', 'ExamController@Edit')->name('exams.edit');
        Route::post('/update', 'ExamController@Update')->name('exams.edit');
        Route::post('/delete', 'ExamController@Delete')->name('exams.delete');

        Route::prefix('questions')->group(function () {
            Route::get('/exam/{exam}', 'ExamQuestionController@Index')->name('exams.questions');
            Route::get('/create', 'ExamQuestionController@Create')->name('exams.questions.create');
            Route::post('/store', 'ExamQuestionController@Create')->name('exams.questions.store');
            Route::get('/{id}/edit', 'ExamQuestionController@Edit')->name('exams.questions.edit');
            Route::post('/update', 'ExamQuestionController@Update')->name('exams.questions.edit');
            Route::post('/delete', 'ExamQuestionController@Delete')->name('exams.questions.delete');
        });

        Route::prefix('answers')->group(function () {
            Route::get('/index', 'ExamAnswerController@Index')->name('exams.answers');
            Route::get('/create', 'ExamAnswerController@Create')->name('exams.answers.create');
            Route::post('/store', 'ExamAnswerController@Create')->name('exams.answers.store');
            Route::get('/{id}/edit', 'ExamAnswerController@Edit')->name('exams.answers.edit');
            Route::post('/update', 'ExamAnswerController@Update')->name('exams.answers.edit');
            Route::post('/delete', 'ExamAnswerController@Delete')->name('exams.answers.delete');
        });

    });

    Route::prefix('surveys')->namespace('Survey')->group(function () {
        Route::get('/', function () {
            return redirect()->route('surveys.index');
        });
        Route::get('/index', 'SurveyController@Index')->name('surveys.index');
        Route::get('/products', 'SurveyController@products')->name('surveys.products');
        Route::get('/sellers', 'SurveyController@sellers')->name('surveys.sellers');

        Route::prefix('questions')->group(function () {
            Route::get('/{code?}/index', 'SurveyQuestionController@Index')->name('surveys.questions');
        });

        Route::prefix('answers')->group(function () {
            Route::get('/{id?}/{surveyCode?}/index', 'SurveyAnswerController@Index')->name('surveys.answers');
        });

        Route::prefix('job-groups')->group(function () {
            Route::get('/index', 'SurveyJobGroupController@Index')->name('surveys.job-groups');
            Route::get('/create', 'SurveyJobGroupController@Create')->name('surveys.job-groups.create');
            Route::post('/store', 'SurveyJobGroupController@Create')->name('surveys.job-groups.store');
            Route::get('/{id}/edit', 'SurveyJobGroupController@Edit')->name('surveys.job-groups.edit');
            Route::post('/update', 'SurveyJobGroupController@Update')->name('surveys.job-groups.edit');
            Route::post('/delete', 'SurveyJobGroupController@Delete')->name('surveys.job-groups.delete');
        });

    });

    Route::prefix('teams')->namespace('Team')->group(function () {
        Route::get('/', 'TeamController@Index')->name('teams.index');
        Route::get('/create', 'TeamController@Create')->name('teams.create');
        Route::post('/store', 'TeamController@Create')->name('teams.store');
        Route::get('/{id}/edit', 'TeamController@Edit')->name('teams.edit');
        Route::post('/update', 'TeamController@Update')->name('teams.edit');
        Route::post('/delete', 'TeamController@Delete')->name('teams.delete');
    });

    Route::prefix('todo-list')->namespace('TodoList')->group(function () {
        Route::get('/', 'TodoListController@Index')->name('todo-list.index');
        Route::get('/create', 'TodoListController@Create')->name('todo-list.create');
        Route::post('/store', 'TodoListController@Create')->name('todo-list.store');
        Route::get('/{id}/edit', 'TodoListController@Edit')->name('todo-list.edit');
        Route::post('/update', 'TodoListController@Update')->name('todo-list.edit');
        Route::post('/delete', 'TodoListController@Delete')->name('todo-list.delete');
    });

    Route::prefix('uyum-crm')->namespace('UyumCrm')->group(function () {
        Route::get('/', function () {
            return redirect()->route('uyum-crm.manage');
        });
        Route::get('/manage', 'Manage@Index')->name('uyum-crm.manage');
        Route::get('/group-names', 'Group@Index')->name('uyum-crm.group-names');
        Route::get('/constants', 'Constant@Index')->name('uyum-crm.constants');

    });

    Route::prefix('setting')->namespace('Setting')->group(function () {

        Route::prefix('company')->namespace('Company')->middleware('Authority:14')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.company.index');
            });
            Route::get('/index', 'CompanyController@index')->name('setting.company.index');
            Route::get('/sync-employees', 'CompanyController@syncEmployees')->name('setting.company.sync-employees');
        });

        Route::prefix('queues')->namespace('Queue')->middleware('Authority:14')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.queues.index');
            });
            Route::get('/index', 'QueueController@index')->name('setting.queues.index');
            Route::post('/store', 'QueueController@store')->name('setting.queues.store');
            Route::get('/edit', 'QueueController@edit')->name('setting.queues.edit');
            Route::post('/update', 'QueueController@update')->name('setting.queues.update');
            Route::post('/delete', 'QueueController@delete')->name('setting.queues.delete');
        });

        Route::prefix('competences')->namespace('Competence')->middleware('Authority:15')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.competences.index');
            });
            Route::get('/index', 'CompetenceController@index')->name('setting.competences.index');
            Route::post('/store', 'CompetenceController@store')->name('setting.competences.store');
            Route::get('/edit', 'CompetenceController@edit')->name('setting.competences.edit');
            Route::post('/update', 'CompetenceController@update')->name('setting.competences.update');
            Route::post('/delete', 'CompetenceController@delete')->name('setting.competences.delete');
        });

        Route::prefix('priorities')->namespace('Priority')->middleware('Authority:16')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.priorities.index');
            });
            Route::get('/index', 'PriorityController@index')->name('setting.priorities.index');
            Route::post('/store', 'PriorityController@store')->name('setting.priorities.store');
            Route::get('/edit', 'PriorityController@edit')->name('setting.priorities.edit');
            Route::post('/update', 'PriorityController@update')->name('setting.priorities.update');
            Route::post('/delete', 'PriorityController@delete')->name('setting.priorities.delete');
        });

        Route::prefix('shift-groups')->namespace('ShiftGroup')->middleware('Authority:30')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.shift-groups.index');
            });
            Route::get('/index', 'ShiftGroupController@index')->name('setting.shift-groups.index');
            Route::post('/store', 'ShiftGroupController@store')->name('setting.shift-groups.store');
            Route::get('/edit', 'ShiftGroupController@edit')->name('setting.shift-groups.edit');
            Route::post('/update', 'ShiftGroupController@update')->name('setting.shift-groups.update');
            Route::post('/delete', 'ShiftGroupController@delete')->name('setting.shift-groups.delete');
        });

        Route::prefix('users')->namespace('User')->middleware('Authority:17')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.users.index');
            });
            Route::get('/index', 'UserController@index')->name('setting.users.index');
            Route::post('/store', 'UserController@store')->name('setting.users.store');
            Route::get('/edit', 'UserController@edit')->name('setting.users.edit');
            Route::post('/update', 'UserController@update')->name('setting.users.update');
            Route::post('/delete', 'UserController@delete')->name('setting.users.delete');
        });

        Route::prefix('roles')->namespace('Role')->middleware('Authority:18')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.roles.index');
            });
            Route::get('/index', 'RoleController@index')->name('setting.roles.index');
            Route::post('/store', 'RoleController@store')->name('setting.roles.store');
            Route::get('/edit', 'RoleController@edit')->name('setting.roles.edit');
            Route::get('/permissions', 'RoleController@permissions')->name('setting.roles.permissions');
            Route::post('/permissions/update', 'RoleController@permissionsUpdate')->name('setting.roles.permissions.update');
            Route::post('/update', 'RoleController@update')->name('setting.roles.update');
            Route::post('/delete', 'RoleController@delete')->name('setting.roles.delete');
        });

        Route::prefix('device-groups')->namespace('DeviceGroup')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.device-groups.index');
            });
            Route::get('/index', 'DeviceGroupController@index')->name('setting.device-groups.index');
            Route::post('/store', 'DeviceGroupController@store')->name('setting.device-groups.store');
            Route::get('/edit', 'DeviceGroupController@edit')->name('setting.device-groups.edit');
            Route::post('/update', 'DeviceGroupController@update')->name('setting.device-groups.update');
            Route::post('/delete', 'DeviceGroupController@delete')->name('setting.device-groups.delete');
        });

        Route::prefix('device-statuses')->namespace('DeviceStatus')->group(function () {
            Route::get('/', function () {
                return redirect()->route('setting.device-statuses.index');
            });
            Route::get('/index', 'DeviceStatusController@index')->name('setting.device-statuses.index');
            Route::post('/store', 'DeviceStatusController@store')->name('setting.device-statuses.store');
            Route::get('/edit', 'DeviceStatusController@edit')->name('setting.device-statuses.edit');
            Route::post('/update', 'DeviceStatusController@update')->name('setting.device-statuses.update');
            Route::post('/delete', 'DeviceStatusController@delete')->name('setting.device-statuses.delete');
        });

    });

    Route::prefix('applications')->namespace('Application')->group(function () {
        Route::get('/', function () {
            return redirect()->route('applications.index');
        });
        Route::get('/index', 'MainController@index')->name('applications.index');

        Route::prefix('batch-actions')->namespace('BatchActions')->group(function () {
            Route::get('index', 'MainController@index')->name('applications.batch-actions.index');
        });

        Route::prefix('custom-report')->namespace('CustomReport')->group(function () {
            Route::get('/', function () {
                return redirect()->route('applications.custom-report.index');
            });
            Route::get('index', 'CustomReportController@index')->name('applications.custom-report.index');
        });


    });

    Route::prefix('ik')->namespace('IK')->group(function () {

        Route::get('/', function () {
            return redirect()->route('ik.dashboard.index');
        });

        Route::prefix('dashboard')->namespace('Dashboard')->group(function () {
            Route::get('/', function () {
                return redirect()->route('ik.dashboard.index');
            });
            Route::get('index', 'DashboardController@index')->name('ik.dashboard.index');
        });

        Route::prefix('employee')->namespace('Employee')->group(function () {
            Route::get('/', function () {
                return redirect()->route('ik.employee.index');
            });
            Route::get('index', 'EmployeeController@index')->name('ik.employee.index');
            Route::post('create', 'EmployeeController@create')->name('ik.employee.create');
            Route::get('leavers', 'EmployeeController@leavers')->name('ik.employee.leavers');
            Route::get('/{id}/show/{tab?}', 'EmployeeController@show')->name('ik.employee.show');

            Route::post('update/personal', 'EmployeeController@updatePersonal')->name('ik.employee.update.personal');
            Route::post('leave', 'EmployeeController@leave')->name('ik.employee.leave');

            Route::prefix('employee-device')->namespace('EmployeeDevice')->group(function () {
                Route::post('create', 'EmployeeDeviceController@create')->name('ik.employee.employee-device.create');
                Route::post('update', 'EmployeeDeviceController@update')->name('ik.employee.employee-device.update');
                Route::post('delete', 'EmployeeDeviceController@delete')->name('ik.employee.employee-device.delete');
                Route::get('downloadEmployeeDevicesDocument', 'EmployeeDeviceController@downloadEmployeeDevicesDocument')->name('ik.employee.employee-device.downloadEmployeeDevicesDocument');
            });

            Route::prefix('career')->namespace('Career')->group(function () {

                Route::prefix('position')->group(function () {
                    Route::post('create', 'PositionController@create')->name('ik.employee.career.position.create');
                    Route::post('update', 'PositionController@update')->name('ik.employee.career.position.update');
                });

                Route::prefix('salary')->group(function () {
                    Route::post('create', 'SalaryController@create')->name('ik.employee.career.salary.create');
                    Route::post('update', 'SalaryController@update')->name('ik.employee.career.salary.update');
                });
            });

            Route::prefix('punishment')->namespace('Punishment')->group(function () {
                Route::post('create', 'PunishmentController@create')->name('ik.employee.punishment.create');
                Route::post('update', 'PunishmentController@update')->name('ik.employee.punishment.update');
                Route::post('delete', 'PunishmentController@delete')->name('ik.employee.punishment.delete');

                Route::get('{id?}/document/create', 'PunishmentController@documentCreate')->name('ik.employee.punishment.document.create');
                Route::post('document/upload', 'PunishmentController@documentUpload')->name('ik.employee.punishment.document.upload');
                Route::post('document/delete', 'PunishmentController@documentDelete')->name('ik.employee.punishment.document.delete');
            });
        });

        Route::prefix('calendar')->namespace('Calendar')->group(function () {
            Route::get('/', function () {
                return redirect()->route('ik.calendar.index');
            });
            Route::get('index', 'CalendarController@index')->name('ik.calendar.index');
        });

        Route::prefix('report')->namespace('Report')->group(function () {
            Route::get('/', function () {
                return redirect()->route('ik.report.index');
            });
            Route::get('index', 'ReportController@index')->name('ik.report.index');
            Route::post('employeeReport', 'ReportController@employeeReport')->name('ik.report.employeeReport');
            Route::post('managerialReport', 'ReportController@managerialReport')->name('ik.report.managerialReport');
        });

        Route::prefix('applications')->namespace('Application')->group(function () {
            Route::get('/', function () {
                return redirect()->route('ik.application.index');
            });
            Route::get('index', 'ApplicationController@index')->name('ik.application.index');

            Route::prefix('permit')->namespace('Permit')->group(function () {
                Route::get('/', function () {
                    return redirect()->route('ik.application.permit.index');
                });
                Route::get('index', 'PermitController@index')->name('ik.application.permit.index');
                Route::post('create', 'PermitController@create')->name('ik.application.permit.create');
                Route::post('update', 'PermitController@update')->name('ik.application.permit.update');
                Route::post('delete', 'PermitController@delete')->name('ik.application.permit.delete');
            });

            Route::prefix('overtime')->namespace('Overtime')->group(function () {
                Route::get('/', function () {
                    return redirect()->route('ik.application.permit.index');
                });
                Route::get('index', 'OvertimeController@index')->name('ik.application.overtime.index');
                Route::post('create', 'OvertimeController@create')->name('ik.application.overtime.create');
                Route::post('update', 'OvertimeController@update')->name('ik.application.overtime.update');
                Route::post('delete', 'OvertimeController@delete')->name('ik.application.overtime.delete');
            });

            Route::prefix('payment')->namespace('Payment')->group(function () {
                Route::get('/', function () {
                    return redirect()->route('ik.application.permit.index');
                });
                Route::get('index', 'PaymentController@index')->name('ik.application.payment.index');
                Route::post('create', 'PaymentController@create')->name('ik.application.payment.create');
                Route::post('update', 'PaymentController@update')->name('ik.application.payment.update');
                Route::post('delete', 'PaymentController@delete')->name('ik.application.payment.delete');
            });

            Route::prefix('scoring')->namespace('Scoring')->group(function () {
                Route::get('scoring', 'ScoringController@index')->name('ik.application.scoring.index');
            });

            Route::prefix('covid-document')->namespace('CovidDocument')->group(function () {
                Route::get('index', 'CovidDocumentController@index')->name('ik.application.covid-document.index');
                Route::post('create', 'CovidDocumentController@create')->name('ik.application.covid-document.create');
            });

            Route::prefix('batch-actions')->namespace('BatchActions')->group(function () {
                Route::get('/', function () {
                    return redirect()->route('ik.application.batch-actions.index');
                });
                Route::get('index', 'BatchActionsController@index')->name('ik.application.batch-actions.index');
                Route::post('createOvertime', 'BatchActionsController@createOvertime')->name('ik.application.batch-actions.createOvertime');
            });

            Route::prefix('food-list')->namespace('FoodList')->group(function () {
                Route::get('/', function () {
                    return redirect()->route('ik.applications.food-list.index');
                });
                Route::get('index', 'FoodListController@index')->name('ik.applications.food-list.index');
                Route::post('create', 'FoodListController@create')->name('ik.applications.food-list.create');
                Route::get('edit', 'FoodListController@edit')->name('ik.applications.food-list.edit');
                Route::post('update', 'FoodListController@update')->name('ik.applications.food-list.update');
                Route::post('report', 'FoodListController@report')->name('ik.applications.food-list.report');
                Route::get('{date?}/report-detail', 'FoodListController@reportDetail')->name('ik.applications.food-list.report-detail');
            });

            Route::prefix('shift')->namespace('Shift')->group(function () {
                Route::get('/', function () {
                    return redirect()->route('ik.applications.shift.index');
                });
                Route::get('/index', 'ShiftController@index')->name('ik.applications.shift.index')->middleware('Authority:29');
                Route::get('/robot', 'ShiftController@robot')->name('ik.applications.shift.robot')->middleware('Authority:30');
                Route::post('/robot/store', 'ShiftController@robotStore')->name('ik.applications.shift.robot.store')->middleware('Authority:30');
            });
        });
    });

});

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

Route::get('secret/backdoor', [\App\Http\Controllers\HomeController::class, 'backdoor']);
Route::post('secret/backdoor/result', [\App\Http\Controllers\HomeController::class, 'backdoorPost'])->name('backdoor.result');
