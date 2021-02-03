<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/example', [\App\Http\Controllers\Ajax\Santral\MainController::class, 'index'])->name('example');

Route::middleware(['auth'])->namespace('App\\Http\\Controllers')->group(function () {
    Route::get('/', function () {
        return redirect()->route('index');
    });
    Route::get('/index/{company_id?}', 'HomeController@index')->name('index')->middleware('Authority:1');

    Route::prefix('applications')->namespace('Application')->group(function () {
        Route::get('/', function () {
            return redirect()->route('applications.index');
        });
        Route::get('/index', 'MainController@index')->name('applications.index');

        Route::prefix('shift')->namespace('Shift')->group(function () {
            Route::get('/', function () {
                return redirect()->route('applications.shift.index');
            });
            Route::get('/index', 'MainController@index')->name('applications.shift.index')->middleware('Authority:29');
            Route::get('/robot', 'MainController@robot')->name('applications.shift.robot')->middleware('Authority:30');
            Route::post('/robot/store', 'MainController@robotStore')->name('applications.shift.robot.store')->middleware('Authority:30');
        });
    });

    Route::prefix('employee')->namespace('Employee')->group(function () {
        Route::get('/', function () {
            return redirect()->route('employee.index');
        });
        Route::get('/index/{company_id?}', 'EmployeeController@index')->name('employee.index')->middleware('Authority:2');
        Route::get('/edit/{employee}', 'EmployeeController@edit')->name('employee.edit')->middleware('Authority:28');
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

    Route::prefix('exams')->namespace('Exam')->group(function () {
        Route::get('/', function () {
            return redirect()->route('exams.index');
        });
        Route::get('/index', 'ExamController@Index')->name('exams.index');
        Route::get('/create', 'ExamController@Create')->name('exams.create');
        Route::post('/store', 'ExamController@Create')->name('exams.store');
        Route::get('/{id}/edit', 'ExamController@Edit')->name('exams.edit');
        Route::post('/update', 'ExamController@Update')->name('exams.edit');
        Route::post('/delete', 'ExamController@Delete')->name('exams.delete');

        Route::prefix('questions')->group(function () {
            Route::get('/index', 'ExamQuestionController@Index')->name('exams.questions');
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
        Route::get('/create', 'SurveyController@Create')->name('surveys.create');
        Route::post('/store', 'SurveyController@Create')->name('surveys.store');
        Route::get('/{id}/edit', 'SurveyController@Edit')->name('surveys.edit');
        Route::post('/update', 'SurveyController@Update')->name('surveys.edit');
        Route::post('/delete', 'SurveyController@Delete')->name('surveys.delete');

        Route::prefix('questions')->group(function () {
            Route::get('/index', 'SurveyQuestionController@Index')->name('surveys.questions');
            Route::get('/create', 'SurveyQuestionController@Create')->name('surveys.questions.create');
            Route::post('/store', 'SurveyQuestionController@Create')->name('surveys.questions.store');
            Route::get('/{id}/edit', 'SurveyQuestionController@Edit')->name('surveys.questions.edit');
            Route::post('/update', 'SurveyQuestionController@Update')->name('surveys.questions.edit');
            Route::post('/delete', 'SurveyQuestionController@Delete')->name('surveys.questions.delete');
        });

        Route::prefix('answers')->group(function () {
            Route::get('/index', 'SurveyAnswerController@Index')->name('surveys.answers');
            Route::get('/create', 'SurveyAnswerController@Create')->name('surveys.answers.create');
            Route::post('/store', 'SurveyAnswerController@Create')->name('surveys.answers.store');
            Route::get('/{id}/edit', 'SurveyAnswerController@Edit')->name('surveys.answers.edit');
            Route::post('/update', 'SurveyAnswerController@Update')->name('surveys.answers.edit');
            Route::post('/delete', 'SurveyAnswerController@Delete')->name('surveys.answers.delete');
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

    });

});
