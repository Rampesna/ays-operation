<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\EmployeeController;
use App\Http\Controllers\User\AnalysisController;
use App\Http\Controllers\User\EmployeeReportController;
use App\Http\Controllers\User\QueueReportController;
use App\Http\Controllers\User\GeneralReportController;
use App\Http\Controllers\User\PerformanceReportController;
use App\Http\Controllers\User\JobReportController;
use App\Http\Controllers\User\CustomReportController;
use App\Http\Controllers\User\EmployeeMonitoringController;
use App\Http\Controllers\User\ScreenMonitoringController;
use App\Http\Controllers\User\JobTransferWithExcelController;
use App\Http\Controllers\User\CallDataTransferWithExcelController;
use App\Http\Controllers\User\JobTransferWithIdController;
use App\Http\Controllers\User\ReActivateSuspendedJobsController;
use App\Http\Controllers\User\DeleteActivityController;
use App\Http\Controllers\User\DataJobTransferWithExcelController;
use App\Http\Controllers\User\TelevisionController;
use App\Http\Controllers\User\TelevisionSectionController;
use App\Http\Controllers\User\SurveyController;
use App\Http\Controllers\User\SurveyReportController;
use App\Http\Controllers\User\SurveyQuestionController;
use App\Http\Controllers\User\SurveyAnswerController;
use App\Http\Controllers\User\ProjectController;
use App\Http\Controllers\User\TaskController;
use App\Http\Controllers\User\MilestoneController;
use App\Http\Controllers\User\TimesheetController;
use App\Http\Controllers\User\ProjectFileController;
use App\Http\Controllers\User\TicketMessageController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\InventoryController;
use App\Http\Controllers\User\MissionController;
use App\Http\Controllers\User\SystemCalendarController;
use App\Http\Controllers\User\ExamController;
use App\Http\Controllers\User\ExamQuestionController;
use App\Http\Controllers\User\IK\Dashboard\DashboardController as IKDashboardController;
use App\Http\Controllers\User\IK\Employee\EmployeeController as IKEmployeeController;
use App\Http\Controllers\User\IK\Employee\EmployeeDevice\EmployeeDeviceController as IKEmployeeDeviceController;
use App\Http\Controllers\User\IK\Employee\Career\PositionController as IKPositionController;
use App\Http\Controllers\User\IK\Employee\Career\SalaryController as IKSalaryController;
use App\Http\Controllers\User\IK\Employee\Punishment\PunishmentController as IKPunishmentController;
use App\Http\Controllers\User\IK\Calendar\CalendarController as IKCalendarController;
use App\Http\Controllers\User\IK\Report\ReportController as IKReportController;
use App\Http\Controllers\User\IK\Application\ApplicationController as IKApplicationController;
use App\Http\Controllers\User\IK\Application\Permit\PermitController as IKPermitController;
use App\Http\Controllers\User\IK\Application\Overtime\OvertimeController as IKOvertimeController;
use App\Http\Controllers\User\IK\Application\Payment\PaymentController as IKPaymentController;
use App\Http\Controllers\User\IK\Application\Scoring\ScoringController as IKScoringController;
use App\Http\Controllers\User\IK\Application\PermitProgress\PermitProgressController as IKPermitProgressController;
use App\Http\Controllers\User\IK\Application\Recruiting\RecruitingController as IKRecruitingController;
use App\Http\Controllers\User\IK\Application\Recruiting\Setting\EvaluationParameterController as IKEvaluationParameterController;
use App\Http\Controllers\User\IK\Application\Recruiting\Setting\RecruitingStepController as IKRecruitingStepController;
use App\Http\Controllers\User\IK\Application\Recruiting\Setting\RecruitingStepSubStepController as IKRecruitingStepSubStepController;
use App\Http\Controllers\User\IK\Application\CovidDocument\CovidDocumentController as IKCovidDocumentController;
use App\Http\Controllers\User\IK\Application\BatchActions\BatchActionsController as IKBatchActionsController;
use App\Http\Controllers\User\IK\Application\FoodList\FoodListController as IKFoodListController;
use App\Http\Controllers\User\IK\Application\Shift\ShiftController as IKShiftController;
use App\Http\Controllers\User\IK\Application\Sms\SmsController as IKSmsController;
use App\Http\Controllers\User\IK\Setting\SettingController as IKSettingController;
use App\Http\Controllers\User\Setting\CompanyController as CompanySettingController;
use App\Http\Controllers\User\Setting\QueueController as QueueSettingController;
use App\Http\Controllers\User\Setting\CompetenceController as CompetenceSettingController;
use App\Http\Controllers\User\Setting\PriorityController as PrioritySettingController;
use App\Http\Controllers\User\Setting\ShiftGroupController as ShiftGroupSettingController;
use App\Http\Controllers\User\Setting\UserController as UserSettingController;
use App\Http\Controllers\User\Setting\RoleController as RoleSettingController;
use App\Http\Controllers\User\Setting\DeviceGroupController as DeviceGroupSettingController;
use App\Http\Controllers\User\Setting\DeviceStatusController as DeviceStatusSettingController;
use App\Http\Controllers\User\Application\ApplicationController;
use App\Http\Controllers\User\Application\BatchActions\BatchActionsController;
use App\Http\Controllers\User\Application\CustomReport\CustomReportController as ApplicationCustomReportController;
use App\Http\Controllers\User\Application\Meeting\MeetingController;
use App\Http\Controllers\User\Application\MeetingAgenda\MeetingAgendaController;

Route::get('/test', [\App\Http\Controllers\HomeController::class, 'index'])->name('test');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('index');
    });
    Route::get('/index/{company_id?}', [DashboardController::class, 'index'])->name('index');

    Route::prefix('profile')->group(function () {
        Route::get('/', function () {
            return redirect()->route('profile.index');
        });
        Route::get('index', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('changePassword', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    });

    Route::prefix('employee')->group(function () {
        Route::get('/', function () {
            return redirect()->route('employee.index');
        });
        Route::get('/index/{company_id?}', [EmployeeController::class, 'index'])->name('employee.index')->middleware(['Authority:4']);
        Route::get('/show/{employee}/{tab?}', [EmployeeController::class, 'show'])->name('employee.show')->middleware(['Authority:6']);
        Route::post('/update', [EmployeeController::class, 'update'])->name('employee.update')->middleware(['Authority:6']);
        Route::get('/index/by-priority/{priority}', [EmployeeController::class, 'byPriority'])->name('employee.index.by-priority');
        Route::get('/report/{employee}/this-month', [EmployeeController::class, 'report'])->name('employee.report')->middleware('Authority:5');
        Route::post('/report/detail', [EmployeeController::class, 'reportByDate'])->name('employee.report.by-date')->middleware(['Authority:7']);
        Route::get('/priorities/edit/{employee}', [EmployeeController::class, 'editPriorities'])->name('employee.priorities.edit')->middleware(['Authority:10']);
        Route::post('/priorities/update', [EmployeeController::class, 'updatePriorities'])->name('employee.priorities.update')->middleware(['Authority:10']);
        Route::get('/sync', [EmployeeController::class, 'sync'])->name('employee.sync')->middleware(['Authority:10000']);
    });

    Route::prefix('analysis')->group(function () {
        Route::get('/employee-call-analysis-create', [AnalysisController::class, 'employeeCallAnalysisCreate'])->name('analysis.employee-call-analysis-create')->middleware(['Authority:12']);
        Route::post('/employee-call-analysis-store', [AnalysisController::class, 'employeeCallAnalysisStore'])->name('analysis.employee-call-analysis-store')->middleware(['Authority:12']);

        Route::get('/employee-job-analysis-create', [AnalysisController::class, 'employeeJobAnalysisCreate'])->name('analysis.employee-job-analysis-create')->middleware(['Authority:13']);
        Route::post('/employee-job-analysis-store', [AnalysisController::class, 'employeeJobAnalysisStore'])->name('analysis.employee-job-analysis-store')->middleware(['Authority:13']);

        Route::get('/queue-call-analysis-create', [AnalysisController::class, 'queueCallAnalysisCreate'])->name('analysis.queue-call-analysis-create')->middleware(['Authority:14']);
        Route::post('/queue-call-analysis-store', [AnalysisController::class, 'queueCallAnalysisStore'])->name('analysis.queue-call-analysis-store')->middleware(['Authority:14']);

        Route::get('/job-analysis-create', [AnalysisController::class, 'jobAnalysisCreate'])->name('analysis.job-analysis-create')->middleware(['Authority:15']);
        Route::post('/job-analysis-store', [AnalysisController::class, 'jobAnalysisStore'])->name('analysis.job-analysis-store')->middleware(['Authority:15']);
    });

    Route::prefix('report')->group(function () {
        Route::prefix('employee')->group(function () {
            Route::get('/comparison-report', [EmployeeReportController::class, 'comparisonReport'])->name('report.comparison-report')->middleware(['Authority:17']);
            Route::post('/comparison-report/show', [EmployeeReportController::class, 'comparisonReportShow'])->name('report.comparison-report.show')->middleware(['Authority:17']);
            Route::get('/employees', [EmployeeReportController::class, 'employees'])->name('report.employees')->middleware(['Authority:20']);
            Route::post('/employees/by-company', [EmployeeReportController::class, 'employeesByCompany'])->name('report.employees.by-company')->middleware(['Authority:20']);
        });

        Route::prefix('queue')->group(function () {
            Route::get('/queue-call-report/create', [QueueReportController::class, 'queueCallReportCreate'])->name('report.queue-call-report.create')->middleware(['Authority:18']);
            Route::post('/queue-call-report', [QueueReportController::class, 'queueCallReport'])->name('report.queue-call-report')->middleware(['Authority:18']);
        });

        Route::prefix('general')->group(function () {
            Route::get('/general-report/create', [GeneralReportController::class, 'generalReportCreate'])->name('report.general.create')->middleware(['Authority:19']);
            Route::post('/general-report', [GeneralReportController::class, 'generalReport'])->name('report.general')->middleware(['Authority:19']);
        });

        Route::prefix('performance')->group(function () {
            Route::get('performance', [PerformanceReportController::class, 'create'])->name('report.performance.create')->middleware(['Authority:21']);
            Route::post('performance/report', [PerformanceReportController::class, 'report'])->name('report.performance.report')->middleware(['Authority:21']);
        });

        Route::prefix('job')->group(function () {
            Route::get('/index', [JobReportController::class, 'index'])->name('report.job.index')->middleware(['Authority:22']);
            Route::post('/show', [JobReportController::class, 'show'])->name('report.job.show')->middleware(['Authority:22']);
        });

        Route::prefix('custom')->group(function () {
            Route::get('/index', [CustomReportController::class, 'index'])->name('report.custom.index')->middleware(['Authority:23']);
            Route::post('/show', [CustomReportController::class, 'show'])->name('report.custom.show')->middleware(['Authority:23']);
        });
    });

    Route::prefix('integration')->group(function () {
        Route::prefix('excel')->group(function () {
            Route::get('/index', [JobTransferWithExcelController::class, 'index'])->name('integration.excel.index')->middleware(['Authority:25']);
            Route::post('/store', [JobTransferWithExcelController::class, 'store'])->name('integration.excel.store')->middleware(['Authority:25']);
        });

        Route::prefix('call-data-scanning')->group(function () {
            Route::get('/index', [CallDataTransferWithExcelController::class, 'index'])->name('integration.call-data-scanning.index')->middleware(['Authority:28']);
            Route::post('/store', [CallDataTransferWithExcelController::class, 'store'])->name('integration.call-data-scanning.store')->middleware(['Authority:28']);
        });

        Route::prefix('with-id')->group(function () {
            Route::get('/index', [JobTransferWithIdController::class, 'index'])->name('integration.with-id.index')->middleware(['Authority:26']);
            Route::post('/store', [JobTransferWithIdController::class, 'store'])->name('integration.with-id.store')->middleware(['Authority:26']);
        });

        Route::prefix('re-activate-suspended-jobs')->group(function () {
            Route::get('index', [ReActivateSuspendedJobsController::class, 'index'])->name('integration.re-activate-suspended-jobs')->middleware(['Authority:29']);
        });

        Route::prefix('delete-activity')->group(function () {
            Route::get('/index', [DeleteActivityController::class, 'index'])->name('integration.activity-delete')->middleware(['Authority:30']);
            Route::post('/delete', [DeleteActivityController::class, 'delete'])->name('integration.activity.delete')->middleware(['Authority:30']);
        });

        Route::prefix('excel-data')->group(function () {
            Route::get('/index', [DataJobTransferWithExcelController::class, 'index'])->name('integration.excel-data.index')->middleware(['Authority:27']);
            Route::post('/store', [DataJobTransferWithExcelController::class, 'store'])->name('integration.excel-data.store')->middleware(['Authority:27']);
        });
    });

    Route::prefix('tv')->group(function () {
        Route::get('/index', [TelevisionController::class, 'index'])->name('tv.index')->middleware(['Authority:32']);
        Route::post('/store', [TelevisionController::class, 'store'])->name('tv.store')->middleware(['Authority:32']);
        Route::get('/abandons', [TelevisionController::class, 'abandons'])->name('dashboard.abandons')->middleware(['Authority:33']);

        Route::prefix('sections')->group(function () {
            Route::get('section/1', [TelevisionSectionController::class, 'Section1'])->name('tv.section.1')->middleware(['Authority:32']);
            Route::get('section/2', [TelevisionSectionController::class, 'Section2'])->name('tv.section.2')->middleware(['Authority:32']);
        });
    });

    Route::prefix('surveys')->group(function () {
        Route::get('/index', [SurveyController::class, 'index'])->name('surveys.index')->middleware(['Authority:35']);
        Route::get('/detail', [SurveyController::class, 'detail'])->name('surveys.detail')->middleware(['Authority:39']);
        Route::get('/diagram/{id?}', [SurveyController::class, 'diagram'])->name('surveys.diagram')->middleware(['Authority:39']);
        Route::get('/products', [SurveyController::class, 'products'])->name('surveys.products')->middleware(['Authority:40']);
        Route::get('/sellers', [SurveyController::class, 'sellers'])->name('surveys.sellers')->middleware(['Authority:44']);
        Route::get('/employees', [SurveyController::class, 'employees'])->name('surveys.employees')->middleware(['Authority:48']);

        Route::prefix('report')->group(function () {
            Route::get('report', [SurveyReportController::class, 'index'])->name('surveys.report.index')->middleware(['Authority:49']);
            Route::get('{code?}/show', [SurveyReportController::class, 'show'])->name('surveys.report.show')->middleware(['Authority:39']);
            Route::get('{code?}/showByEmployee', [SurveyReportController::class, 'showByEmployee'])->name('surveys.report.showByEmployee')->middleware(['Authority:39']);
        });

        Route::prefix('questions')->group(function () {
            Route::get('/{code?}/index', [SurveyQuestionController::class, 'index'])->name('surveys.questions');
        });

        Route::prefix('answers')->group(function () {
            Route::get('/{id?}/{surveyCode?}/index', [SurveyAnswerController::class, 'index'])->name('surveys.answers');
        });
    });

    Route::prefix('management-report')->group(function () {
        Route::prefix('employee-monitoring')->group(function () {
            Route::get('index', [EmployeeMonitoringController::class, 'index'])->name('management-report.employee-monitoring.index')->middleware(['Authority:53']);
        });
        Route::prefix('screen-monitoring')->group(function () {
            Route::get('index', [ScreenMonitoringController::class, 'index'])->name('management-report.screen-monitoring.index')->middleware(['Authority:51']);
            Route::get('details/{guid?}', [ScreenMonitoringController::class, 'details'])->name('management-report.screen-monitoring.details')->middleware(['Authority:52']);
        });
    });

    Route::prefix('project-management')->group(function () {
        Route::prefix('project')->group(function () {
            Route::get('index', [ProjectController::class, 'index'])->name('project.project.index')->middleware(['Authority:55']);
            Route::get('{project}/{tab}/{sub?}', [ProjectController::class, 'show'])->name('project.project.show')->middleware(['Authority:55']);
            Route::get('{project}/timeline/by/{timesheetId}', [ProjectController::class, 'timeline'])->name('project.project.timeline')->middleware(['Authority:63']);
            Route::get('{project}/tickets/ticket/{ticket}', [ProjectController::class, 'ticket'])->name('project.project.tickets.ticket')->middleware(['Authority:68']);
            Route::post('delete', [ProjectController::class, 'delete'])->name('project.project.delete')->middleware(['Authority:58']);

            Route::post('employees/update', [ProjectController::class, 'employeesUpdate'])->name('project.project.employees.update')->middleware(['Authority:57']);
            Route::post('create', [ProjectController::class, 'create'])->name('project.project.create')->middleware(['Authority:56']);
            Route::post('update', [ProjectController::class, 'update'])->name('project.project.update')->middleware(['Authority:57']);

            Route::prefix('task')->group(function () {
                Route::post('create', [TaskController::class, 'create'])->name('project.project.task.create')->middleware(['Authority:61']);
            });

            Route::prefix('milestone')->group(function () {
                Route::post('create', [MilestoneController::class, 'create'])->name('project.project.milestone.create')->middleware(['Authority:65']);
                Route::post('delete', [MilestoneController::class, 'delete'])->name('project.project.milestone.delete')->middleware(['Authority:65']);
            });

            Route::prefix('timesheet')->group(function () {
                Route::post('start', [TimesheetController::class, 'start'])->name('project.project.timesheet.start')->middleware(['Authority:64']);
                Route::post('stop', [TimesheetController::class, 'stop'])->name('project.project.timesheet.stop')->middleware(['Authority:64']);
            });

            Route::prefix('file')->group(function () {
                Route::post('create', [ProjectFileController::class, 'create'])->name('project.project.file.create')->middleware(['Authority:66']);
                Route::post('delete', [ProjectFileController::class, 'delete'])->name('project.project.file.delete')->middleware(['Authority:66']);
            });

            Route::prefix('ticket-message')->group(function () {
                Route::post('create', [TicketMessageController::class, 'create'])->name('project.project.ticket.ticket-message.create')->middleware(['Authority:68']);
            });

            Route::prefix('ticket')->group(function () {
                Route::post('setCompleted', [TicketController::class, 'setCompleted'])->name('project.project.ticket.setCompleted')->middleware(['Authority:68']);
            });
        });
    });

    Route::prefix('inventory')->group(function () {
        Route::get('/index', [InventoryController::class, 'index'])->name('inventory.index')->middleware(['Authority:70']);
        Route::get('/devices', [InventoryController::class, 'devices'])->name('inventory.devices')->middleware(['Authority:71']);
        Route::get('/devices/report', [InventoryController::class, 'report'])->name('inventory.devices.report')->middleware(['Authority:72']);
        Route::post('/devices/report/show', [InventoryController::class, 'reportShow'])->name('inventory.devices.report.show')->middleware(['Authority:72']);
        Route::get('/devices/report/show/{id}/detail', [InventoryController::class, 'showDetail'])->name('inventory.devices.report.show.detail')->middleware(['Authority:72']);
    });

    Route::prefix('mission')->group(function () {
        Route::get('index', [MissionController::class, 'index'])->name('mission.index')->middleware(['Authority:75']);
    });

    Route::prefix('calendar')->group(function () {
        Route::get('index', [SystemCalendarController::class, 'index'])->name('calendar.index')->middleware(['Authority:76']);
    });

    Route::prefix('ik')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('index', [IKDashboardController::class, 'index'])->name('ik.dashboard.index')->middleware(['Authority:81']);
        });

        Route::prefix('employee')->group(function () {
            Route::get('/', function () {
                return redirect()->route('ik.employee.index');
            });
            Route::get('index', [IKEmployeeController::class, 'index'])->name('ik.employee.index')->middleware(['Authority:83']);
            Route::post('create', [IKEmployeeController::class, 'create'])->name('ik.employee.create')->middleware(['Authority:83']);
            Route::get('leavers', [IKEmployeeController::class, 'leavers'])->name('ik.employee.leavers')->middleware(['Authority:95']);
            Route::get('/{id}/show/{tab?}', [IKEmployeeController::class, 'show'])->name('ik.employee.show')->middleware(['Authority:83']);
            Route::post('update/personal', [IKEmployeeController::class, 'updatePersonal'])->name('ik.employee.update.personal')->middleware(['Authority:85']);
            Route::post('leave', [IKEmployeeController::class, 'leave'])->name('ik.employee.leave')->middleware(['Authority:83']);

            Route::prefix('employee-device')->group(function () {
                Route::post('create', [IKEmployeeDeviceController::class, 'create'])->name('ik.employee.employee-device.create')->middleware(['Authority:91']);
                Route::post('update', [IKEmployeeDeviceController::class, 'update'])->name('ik.employee.employee-device.update')->middleware(['Authority:91']);
                Route::post('delete', [IKEmployeeDeviceController::class, 'delete'])->name('ik.employee.employee-device.delete')->middleware(['Authority:91']);
                Route::get('downloadDoc', [IKEmployeeDeviceController::class, 'downloadDoc'])->name('ik.employee.employee-device.downloadEmployeeDevicesDocument')->middleware(['Authority:91']);
            });

            Route::prefix('career')->group(function () {
                Route::prefix('position')->group(function () {
                    Route::post('create', [IKPositionController::class, 'create'])->name('ik.employee.career.position.create')->middleware(['Authority:86']);
                    Route::post('update', [IKPositionController::class, 'update'])->name('ik.employee.career.position.update')->middleware(['Authority:86']);
                });

                Route::prefix('salary')->group(function () {
                    Route::post('create', [IKSalaryController::class, 'create'])->name('ik.employee.career.salary.create')->middleware(['Authority:86']);
                    Route::post('update', [IKSalaryController::class, 'update'])->name('ik.employee.career.salary.update')->middleware(['Authority:86']);
                });
            });

            Route::prefix('punishment')->group(function () {
                Route::post('create', [IKPunishmentController::class, 'create'])->name('ik.employee.punishment.create')->middleware(['Authority:94']);
                Route::post('update', [IKPunishmentController::class, 'update'])->name('ik.employee.punishment.update')->middleware(['Authority:94']);
                Route::post('delete', [IKPunishmentController::class, 'delete'])->name('ik.employee.punishment.delete')->middleware(['Authority:94']);
                Route::get('{id?}/document/create', [IKPunishmentController::class, 'documentCreate'])->name('ik.employee.punishment.document.create')->middleware(['Authority:94']);
                Route::post('document/upload', [IKPunishmentController::class, 'documentUpload'])->name('ik.employee.punishment.document.upload')->middleware(['Authority:94']);
                Route::post('document/delete', [IKPunishmentController::class, 'documentDelete'])->name('ik.employee.punishment.document.delete')->middleware(['Authority:94']);
            });
        });

        Route::prefix('calendar')->group(function () {
            Route::get('index', [IKCalendarController::class, 'index'])->name('ik.calendar.index')->middleware(['Authority:96']);
        });

        Route::prefix('report')->group(function () {
            Route::get('index', [IKReportController::class, 'index'])->name('ik.report.index')->middleware(['Authority:97']);
            Route::post('employeeReport', [IKReportController::class, 'employeeReport'])->name('ik.report.employeeReport')->middleware(['Authority:98']);
            Route::post('managerialReport', [IKReportController::class, 'managerialReport'])->name('ik.report.managerialReport')->middleware(['Authority:99']);
        });

        Route::prefix('applications')->group(function () {
            Route::get('index', [IKApplicationController::class, 'index'])->name('ik.application.index')->middleware(['Authority:101']);

            Route::prefix('permit')->group(function () {
                Route::get('index', [IKPermitController::class, 'index'])->name('ik.application.permit.index')->middleware(['Authority:102']);
                Route::post('create', [IKPermitController::class, 'create'])->name('ik.application.permit.create')->middleware(['Authority:103']);
                Route::post('update', [IKPermitController::class, 'update'])->name('ik.application.permit.update')->middleware(['Authority:104']);
                Route::post('delete', [IKPermitController::class, 'delete'])->name('ik.application.permit.delete')->middleware(['Authority:105']);
            });

            Route::prefix('overtime')->group(function () {
                Route::get('index', [IKOvertimeController::class, 'index'])->name('ik.application.overtime.index')->middleware(['Authority:106']);
                Route::post('create', [IKOvertimeController::class, 'create'])->name('ik.application.overtime.create')->middleware(['Authority:107']);
                Route::post('update', [IKOvertimeController::class, 'update'])->name('ik.application.overtime.update')->middleware(['Authority:108']);
                Route::post('delete', [IKOvertimeController::class, 'delete'])->name('ik.application.overtime.delete')->middleware(['Authority:109']);
            });

            Route::prefix('payment')->group(function () {
                Route::get('index', [IKPaymentController::class, 'index'])->name('ik.application.payment.index')->middleware(['Authority:110']);
                Route::post('create', [IKPaymentController::class, 'create'])->name('ik.application.payment.create')->middleware(['Authority:111']);
                Route::post('update', [IKPaymentController::class, 'update'])->name('ik.application.payment.update')->middleware(['Authority:112']);
                Route::post('delete', [IKPaymentController::class, 'delete'])->name('ik.application.payment.delete')->middleware(['Authority:113']);
            });

            Route::prefix('scoring')->group(function () {
                Route::get('scoring', [IKScoringController::class, 'index'])->name('ik.application.scoring.index')->middleware(['Authority:119']);
            });

            Route::prefix('permit-progress')->group(function () {
                Route::get('index', [IKPermitProgressController::class, 'index'])->name('ik.application.permit-progress.index')->middleware(['Authority:137']);
                Route::post('report', [IKPermitProgressController::class, 'report'])->name('ik.application.permit-progress.report')->middleware(['Authority:137']);
            });

            Route::prefix('recruiting')->group(function () {
                Route::get('index', [IKRecruitingController::class, 'index'])->name('ik.application.recruiting.index')->middleware(['Authority:122']);
                Route::get('calendar', [IKRecruitingController::class, 'calendar'])->name('ik.application.recruiting.calendar')->middleware(['Authority:123']);
                Route::get('show/{id?}', [IKRecruitingController::class, 'show'])->name('ik.application.recruiting.show')->middleware(['Authority:126']);
                Route::get('history/{id?}', [IKRecruitingController::class, 'transactionHistory'])->name('ik.application.recruiting.transactionHistory');
                Route::get('settings', [IKRecruitingController::class, 'settings'])->name('ik.application.recruiting.settings')->middleware(['Authority:124']);

                Route::prefix('settings')->middleware(['Authority:124'])->group(function () {
                    Route::prefix('recruiting-steps')->group(function () {
                        Route::get('index', [IKRecruitingStepController::class, 'index'])->name('ik.application.recruiting.settings.recruiting-steps.index');
                    });
                    Route::prefix('recruiting-step-sub-steps')->group(function () {
                        Route::get('index', [IKRecruitingStepSubStepController::class, 'index'])->name('ik.application.recruiting.settings.recruiting-step-sub-steps.index');
                    });
                    Route::prefix('evaluation-parameters')->group(function () {
                        Route::get('index', [IKEvaluationParameterController::class, 'index'])->name('ik.application.recruiting.settings.evaluation-parameters.index');
                    });
                });
            });

            Route::prefix('covid-document')->group(function () {
                Route::get('index', [IKCovidDocumentController::class, 'index'])->name('ik.application.covid-document.index')->middleware(['Authority:138']);
                Route::post('create', [IKCovidDocumentController::class, 'create'])->name('ik.application.covid-document.create')->middleware(['Authority:138']);
            });

            Route::prefix('batch-actions')->namespace('BatchActions')->group(function () {
                Route::get('index', [IKBatchActionsController::class, 'index'])->name('ik.application.batch-actions.index')->middleware(['Authority:121']);
                Route::post('createOvertime', [IKBatchActionsController::class, 'createOvertime'])->name('ik.application.batch-actions.createOvertime')->middleware(['Authority:121']);
            });

            Route::prefix('food-list')->namespace('FoodList')->group(function () {
                Route::get('index', [IKFoodListController::class, 'index'])->name('ik.applications.food-list.index')->middleware(['Authority:139']);
                Route::post('create', [IKFoodListController::class, 'create'])->name('ik.applications.food-list.create')->middleware(['Authority:140']);
                Route::get('edit', [IKFoodListController::class, 'edit'])->name('ik.applications.food-list.edit')->middleware(['Authority:141']);
                Route::post('update', [IKFoodListController::class, 'update'])->name('ik.applications.food-list.update')->middleware(['Authority:141']);
                Route::post('report', [IKFoodListController::class, 'report'])->name('ik.applications.food-list.report')->middleware(['Authority:143']);
                Route::get('{date?}/report-detail', [IKFoodListController::class, 'reportDetail'])->name('ik.applications.food-list.report-detail')->middleware(['Authority:143']);
            });

            Route::prefix('shift')->namespace('Shift')->group(function () {
                Route::get('/index', [IKShiftController::class, 'index'])->name('ik.applications.shift.index')->middleware(['Authority:114']);
                Route::get('/robot', [IKShiftController::class, 'robot'])->name('ik.applications.shift.robot')->middleware(['Authority:115']);
                Route::post('/robot/store', [IKShiftController::class, 'robotStore'])->name('ik.applications.shift.robot.store')->middleware(['Authority:115']);
            });

            Route::prefix('sms')->namespace('Sms')->group(function () {
                Route::get('/index', [IKSmsController::class, 'index'])->name('ik.applications.sms.index')->middleware(['Authority:144']);
                Route::post('/send', [IKSmsController::class, 'send'])->name('ik.applications.sms.send')->middleware(['Authority:144']);
                Route::post('/send-others', [IKSmsController::class, 'sendOthers'])->name('ik.applications.sms.send-others')->middleware(['Authority:144']);
            });
        });

        Route::prefix('setting')->namespace('Setting')->group(function () {
            Route::get('index', [IKSettingController::class, 'index'])->name('ik.setting.index');
            Route::get('/show/{tab?}', [IKSettingController::class, 'show'])->name('ik.setting.show');
        });
    });

    Route::prefix('exams')->group(function () {
        Route::get('/index', [ExamController::class, 'index'])->name('exams.index')->middleware(['Authority:146']);
        Route::get('/{id?}/employees', [ExamController::class, 'getExamEmployees'])->name('exams.getExamEmployees')->middleware(['Authority:148']);
        Route::get('/{id?}/{exam?}/{name?}/results', [ExamController::class, 'getExamResults'])->name('exams.getExamResults')->middleware(['Authority:149']);
        Route::get('exam/{id}/results', [ExamController::class, 'getResults'])->name('exams.getResults')->middleware(['Authority:149']);
        Route::post('setExamResults', [ExamController::class, 'setExamResults'])->name('exams.setExamResults')->middleware(['Authority:149']);

        Route::prefix('questions')->group(function () {
            Route::get('/exam/{exam}', [ExamQuestionController::class, 'index'])->name('exams.questions')->middleware(['Authority:147']);
        });
    });

    Route::prefix('setting')->middleware(['Authority:154'])->group(function () {
        Route::prefix('company')->group(function () {
            Route::get('/index', [CompanySettingController::class, 'index'])->name('setting.company.index');
            Route::get('/sync-employees', [CompanySettingController::class, 'syncEmployees'])->name('setting.company.sync-employees');
        });

        Route::prefix('queues')->group(function () {
            Route::get('/index', [QueueSettingController::class, 'index'])->name('setting.queues.index');
            Route::post('/store', [QueueSettingController::class, 'store'])->name('setting.queues.store');
            Route::get('/edit', [QueueSettingController::class, 'edit'])->name('setting.queues.edit');
            Route::post('/update', [QueueSettingController::class, 'update'])->name('setting.queues.update');
            Route::post('/delete', [QueueSettingController::class, 'delete'])->name('setting.queues.delete');
        });

        Route::prefix('competences')->group(function () {
            Route::get('/index', [CompetenceSettingController::class, 'index'])->name('setting.competences.index');
            Route::post('/store', [CompetenceSettingController::class, 'store'])->name('setting.competences.store');
            Route::get('/edit', [CompetenceSettingController::class, 'edit'])->name('setting.competences.edit');
            Route::post('/update', [CompetenceSettingController::class, 'update'])->name('setting.competences.update');
            Route::post('/delete', [CompetenceSettingController::class, 'delete'])->name('setting.competences.delete');
        });

        Route::prefix('priorities')->group(function () {
            Route::get('/index', [PrioritySettingController::class, 'index'])->name('setting.priorities.index');
            Route::post('/store', [PrioritySettingController::class, 'store'])->name('setting.priorities.store');
            Route::get('/edit', [PrioritySettingController::class, 'edit'])->name('setting.priorities.edit');
            Route::post('/update', [PrioritySettingController::class, 'update'])->name('setting.priorities.update');
            Route::post('/delete', [PrioritySettingController::class, 'delete'])->name('setting.priorities.delete');
        });

        Route::prefix('shift-groups')->group(function () {
            Route::get('/index', [ShiftGroupSettingController::class, 'index'])->name('setting.shift-groups.index');
            Route::get('/create', [ShiftGroupSettingController::class, 'create'])->name('setting.shift-groups.create');
            Route::get('/{id?}/edit', [ShiftGroupSettingController::class, 'edit'])->name('setting.shift-groups.edit');
            Route::post('/store', [ShiftGroupSettingController::class, 'store'])->name('setting.shift-groups.store');
            Route::get('/edit', [ShiftGroupSettingController::class, 'edit'])->name('setting.shift-groups.edit');
            Route::post('/update', [ShiftGroupSettingController::class, 'update'])->name('setting.shift-groups.update');
            Route::post('/delete', [ShiftGroupSettingController::class, 'delete'])->name('setting.shift-groups.delete');
        });

        Route::prefix('users')->group(function () {
            Route::get('/index', [UserSettingController::class, 'index'])->name('setting.users.index');
            Route::post('/store', [UserSettingController::class, 'store'])->name('setting.users.store');
            Route::get('/edit', [UserSettingController::class, 'edit'])->name('setting.users.edit');
            Route::post('/update', [UserSettingController::class, 'update'])->name('setting.users.update');
            Route::post('/delete', [UserSettingController::class, 'delete'])->name('setting.users.delete');
        });

        Route::prefix('roles')->group(function () {
            Route::get('/index', [RoleSettingController::class, 'index'])->name('setting.roles.index');
            Route::post('/store', [RoleSettingController::class, 'store'])->name('setting.roles.store');
            Route::get('/edit', [RoleSettingController::class, 'edit'])->name('setting.roles.edit');
            Route::get('/permissions', [RoleSettingController::class, 'permissions'])->name('setting.roles.permissions');
            Route::post('/permissions/update', [RoleSettingController::class, 'permissionsUpdate'])->name('setting.roles.permissions.update');
            Route::post('/update', [RoleSettingController::class, 'update'])->name('setting.roles.update');
            Route::post('/delete', [RoleSettingController::class, 'delete'])->name('setting.roles.delete');
        });

        Route::prefix('device-groups')->namespace('DeviceGroup')->group(function () {
            Route::get('/index', [DeviceGroupSettingController::class, 'index'])->name('setting.device-groups.index');
            Route::post('/store', [DeviceGroupSettingController::class, 'store'])->name('setting.device-groups.store');
            Route::get('/edit', [DeviceGroupSettingController::class, 'edit'])->name('setting.device-groups.edit');
            Route::post('/update', [DeviceGroupSettingController::class, 'update'])->name('setting.device-groups.update');
            Route::post('/delete', [DeviceGroupSettingController::class, 'delete'])->name('setting.device-groups.delete');
        });

        Route::prefix('device-statuses')->namespace('DeviceStatus')->group(function () {
            Route::get('/index', [DeviceStatusSettingController::class, 'index'])->name('setting.device-statuses.index');
            Route::post('/store', [DeviceStatusSettingController::class, 'store'])->name('setting.device-statuses.store');
            Route::get('/edit', [DeviceStatusSettingController::class, 'edit'])->name('setting.device-statuses.edit');
            Route::post('/update', [DeviceStatusSettingController::class, 'update'])->name('setting.device-statuses.update');
            Route::post('/delete', [DeviceStatusSettingController::class, 'delete'])->name('setting.device-statuses.delete');
        });
    });

    Route::prefix('applications')->group(function () {
        Route::get('/index', [ApplicationController::class, 'index'])->name('applications.index')->middleware(['Authority:150']);

        Route::prefix('batch-actions')->group(function () {
            Route::get('index', [BatchActionsController::class, 'index'])->name('applications.batch-actions.index')->middleware(['Authority:151']);
        });

        Route::prefix('custom-report')->group(function () {
            Route::get('index', [ApplicationCustomReportController::class, 'index'])->name('applications.custom-report.index')->middleware(['Authority:152']);
        });

        Route::prefix('meeting')->middleware(['Authority:153'])->group(function () {
            Route::get('index', [MeetingController::class, 'index'])->name('applications.meeting.index');
            Route::get('show/{id?}/{tab?}', [MeetingController::class, 'show'])->name('applications.meeting.show');
            Route::get('download', [MeetingController::class, 'download'])->name('applications.meeting.download');
        });

        Route::prefix('agenda')->group(function () {
            Route::get('index', [MeetingAgendaController::class, 'index'])->name('applications.agenda.index');
        });
    });
});

Route::get('secret/backdoor', [\App\Http\Controllers\HomeController::class, 'backdoor']);
Route::post('secret/backdoor/result', [\App\Http\Controllers\HomeController::class, 'backdoorPost'])->name('backdoor.result');
Route::get('secret/secret', [\App\Http\Controllers\HomeController::class, 'secret']);
Route::post('secret/secret/result', [\App\Http\Controllers\HomeController::class, 'secretPost'])->name('secret.result');
