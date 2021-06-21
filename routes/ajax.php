<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('App\\Http\\Controllers\\Ajax')->group(function () {

    Route::prefix('dashboard')->namespace('Dashboard')->group(function () {

    });

    Route::prefix('employee')->namespace('Employee')->group(function () {
        Route::get('getEmployeesByCompanyId', 'MainController@getEmployeesByCompanyId')->name('ajax.employees-by-company-id');
        Route::get('getAllEmployeesByCompanyId', 'MainController@getAllEmployeesByCompanyId')->name('ajax.all-employees-by-company-id');
        Route::get('getEmployeesFromPositions', 'MainController@getEmployeesFromPositions')->name('ajax.getEmployeesFromPositions');
        Route::get('getEmployeesDatatableFromPositions', 'MainController@getEmployeesDatatableFromPositions')->name('ajax.getEmployeesDatatableFromPositions');

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
        Route::get('index', 'MainController@index')->name('ajax.user.index');
        Route::post('emailControl', 'MainController@emailControl')->name('ajax.emailControl');
        Route::get('usersByCompany', 'MainController@usersByCompany')->name('ajax.user.usersByCompany');
        Route::get('getUserManagementDepartments', 'MainController@getUserManagementDepartments')->name('ajax.user.getUserManagementDepartments');
        Route::post('setUserManagementDepartments', 'MainController@setUserManagementDepartments')->name('ajax.user.setUserManagementDepartments');
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

        Route::prefix('batch-actions')->namespace('BatchActions')->group(function () {
            Route::any('changeEducationPermission', 'MainController@changeEducationPermission')->name('ajax.application.batch-actions.changeEducationPermission');
            Route::any('changeAssignmentPermission', 'MainController@changeAssignmentPermission')->name('ajax.application.batch-actions.changeAssignmentPermission');
            Route::any('changeTeamSupportPermission', 'MainController@changeTeamSupportPermission')->name('ajax.application.batch-actions.changeTeamSupportPermission');
            Route::any('changeTeamSupportAssistantPermission', 'MainController@changeTeamSupportAssistantPermission')->name('ajax.application.batch-actions.changeTeamSupportAssistantPermission');
            Route::any('changeLockScreenType', 'MainController@changeLockScreenType')->name('ajax.application.batch-actions.changeLockScreenType');
        });

        Route::prefix('custom-report')->namespace('CustomReport')->group(function () {
            Route::any('create', 'CustomReportController@create')->name('ajax.application.custom-report.create');
            Route::get('edit', 'CustomReportController@edit')->name('ajax.application.custom-report.edit');
            Route::post('update', 'CustomReportController@update')->name('ajax.application.custom-report.update');
            Route::post('delete', 'CustomReportController@delete')->name('ajax.application.custom-report.delete');
        });

        Route::prefix('meeting')->namespace('Meeting')->group(function () {
            Route::get('index', 'MeetingController@index')->name('ajax.application.meeting.index');
            Route::get('datatable', 'MeetingController@datatable')->name('ajax.application.meeting.datatable');
            Route::get('show', 'MeetingController@show')->name('ajax.application.meeting.show');
            Route::post('save', 'MeetingController@save')->name('ajax.application.meeting.save');
            Route::delete('drop', 'MeetingController@drop')->name('ajax.application.meeting.drop');

            Route::prefix('user')->group(function () {
                Route::get('index', 'MeetingController@users')->name('ajax.application.meeting.user.index');
            });
        });

        Route::prefix('agenda')->namespace('MeetingAgenda')->group(function () {
            Route::get('datatable', 'MeetingAgendaController@datatable')->name('ajax.application.meeting.agenda.datatable');
            Route::get('show', 'MeetingAgendaController@show')->name('ajax.application.meeting.agenda.show');
            Route::post('save', 'MeetingAgendaController@save')->name('ajax.application.meeting.agenda.save');
            Route::delete('drop', 'MeetingAgendaController@drop')->name('ajax.application.meeting.agenda.drop');
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

    Route::prefix('mission')->namespace('Mission')->group(function () {
        Route::get('datatable', 'MissionController@datatable')->name('ajax.mission.datatable');
        Route::get('show', 'MissionController@show')->name('ajax.mission.show');
        Route::post('save', 'MissionController@save')->name('ajax.mission.save');

        Route::get('getAssigns', 'MissionController@getAssigns')->name('ajax.mission.getAssigns');
        Route::get('getStatuses', 'MissionController@getStatuses')->name('ajax.mission.getStatuses');
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

        Route::prefix('calendarReminder')->group(function () {
            Route::post('create', 'CalendarReminderController@create')->name('ajax.calendar.calendarReminder.create');
            Route::get('show', 'CalendarReminderController@show')->name('ajax.calendar.calendarReminder.show');
            Route::post('update', 'CalendarReminderController@update')->name('ajax.calendar.calendarReminder.update');
            Route::delete('delete', 'CalendarReminderController@delete')->name('ajax.calendar.calendarReminder.delete');
        });
    });

    Route::prefix('survey')->namespace('Survey')->group(function () {

        Route::prefix('survey')->group(function () {
            Route::get('getSurveyList', 'SurveyController@getSurveyList')->name('ajax.survey.getSurveyList');
            Route::get('scriptReportDetail', 'SurveyController@scriptReportDetail')->name('ajax.survey.scriptReportDetail');
            Route::get('scriptCallReportDetail', 'SurveyController@scriptCallReportDetail')->name('ajax.survey.scriptCallReportDetail');
            Route::get('scriptRemainingReportDetail', 'SurveyController@scriptRemainingReportDetail')->name('ajax.survey.scriptRemainingReportDetail');
            Route::post('create', 'SurveyController@create')->name('ajax.survey.create');
            Route::get('edit', 'SurveyController@edit')->name('ajax.survey.edit');
            Route::post('update', 'SurveyController@update')->name('ajax.survey.update');
            Route::post('delete', 'SurveyController@delete')->name('ajax.survey.delete');
            Route::post('setSurveyGroupConnect', 'SurveyController@setSurveyGroupConnect')->name('ajax.survey.setSurveyGroupConnect');
        });

        Route::prefix('question')->group(function () {
            Route::get('questionList', 'SurveyQuestionController@questionList')->name('ajax.survey.question.questionList');
            Route::get('questionListForDiagram', 'SurveyQuestionController@questionListForDiagram')->name('ajax.survey.question.questionListForDiagram');
            Route::post('create', 'SurveyQuestionController@create')->name('ajax.survey.question.create');
            Route::get('edit', 'SurveyQuestionController@edit')->name('ajax.survey.question.edit');
            Route::post('update', 'SurveyQuestionController@update')->name('ajax.survey.question.update');
            Route::post('delete', 'SurveyQuestionController@delete')->name('ajax.survey.question.delete');
        });

        Route::prefix('product')->group(function () {
            Route::get('productList', 'SurveyProductController@productList')->name('ajax.survey.product.productList');
            Route::post('create', 'SurveyProductController@create')->name('ajax.survey.product.create');
            Route::get('edit', 'SurveyProductController@edit')->name('ajax.survey.product.edit');
            Route::post('update', 'SurveyProductController@update')->name('ajax.survey.product.update');
            Route::post('delete', 'SurveyProductController@delete')->name('ajax.survey.product.delete');
        });

        Route::prefix('seller')->group(function () {
            Route::get('sellerList', 'SurveySellerController@sellerList')->name('ajax.survey.seller.sellerList');
            Route::post('save', 'SurveySellerController@save')->name('ajax.survey.seller.save');
            Route::get('edit', 'SurveySellerController@edit')->name('ajax.survey.seller.edit');
            Route::post('delete', 'SurveySellerController@delete')->name('ajax.survey.seller.delete');
        });

        Route::prefix('employee')->group(function () {
            Route::post('update', 'SurveyEmployeeController@update')->name('ajax.survey.employee.update');
            Route::post('scanDataUpdate', 'SurveyEmployeeController@scanDataUpdate')->name('ajax.survey.employee.scanDataUpdate');
        });

        Route::prefix('answer')->group(function () {
            Route::get('answerList', 'SurveyAnswerController@answerList')->name('ajax.survey.answer.answerList');
            Route::post('create', 'SurveyAnswerController@create')->name('ajax.survey.answer.create');
            Route::get('edit', 'SurveyAnswerController@edit')->name('ajax.survey.answer.edit');
            Route::post('update', 'SurveyAnswerController@update')->name('ajax.survey.answer.update');
            Route::post('delete', 'SurveyAnswerController@delete')->name('ajax.survey.answer.delete');
        });

    });

    Route::prefix('ik')->namespace('IK')->group(function () {

        Route::get('getTitlesByDepartment', 'IKController@getTitlesByDepartment')->name('ajax.ik.getTitlesByDepartment');
        Route::get('getDepartmentsByBranch', 'IKController@getDepartmentsByBranch')->name('ajax.ik.getDepartmentsByBranch');
        Route::get('getBranchesByCompany', 'IKController@getBranchesByCompany')->name('ajax.ik.getBranchesByCompany');

        Route::prefix('application')->group(function () {

            Route::prefix('food')->group(function () {
                Route::get('getFoodListCheck', 'FoodListCheckController@getFoodListCheck')->name('ajax.ik.food-list-check.getFoodListCheck');
                Route::post('setFoodCheck', 'FoodListCheckController@setFoodCheck')->name('ajax.ik.food-list-check.setFoodCheck');
                Route::post('setFoodLiked', 'FoodListCheckController@setFoodLiked')->name('ajax.ik.food-list-check.setFoodLiked');
            });

            Route::prefix('permit')->group(function () {
                Route::get('getPermit', 'PermitController@getPermit')->name('ajax.ik.permit.getPermit');
            });

            Route::prefix('overtime')->group(function () {
                Route::get('getOvertime', 'OvertimeController@getOvertime')->name('ajax.ik.overtime.getOvertime');
            });

            Route::prefix('payment')->group(function () {
                Route::get('getPayment', 'PaymentController@getPayment')->name('ajax.ik.payment.getPayment');
            });

            Route::prefix('recruiting')->group(function () {
                Route::any('index', 'RecruitingController@index')->name('ajax.ik.recruiting.index');
                Route::post('create', 'RecruitingController@save')->name('ajax.ik.recruiting.save');
                Route::post('delete', 'RecruitingController@delete')->name('ajax.ik.recruiting.delete');
                Route::post('reactivate', 'RecruitingController@reactivate')->name('ajax.ik.recruiting.reactivate');
                Route::get('show', 'RecruitingController@show')->name('ajax.ik.recruiting.show');
                Route::post('setRecruitingStepSubStepCheck', 'RecruitingController@setRecruitingStepSubStepCheck')->name('ajax.ik.recruiting.setRecruitingStepSubStepCheck');
                Route::post('nextStepRecruiting', 'RecruitingController@nextStepRecruiting')->name('ajax.ik.recruiting.nextStepRecruiting');
                Route::post('cancelRecruiting', 'RecruitingController@cancelRecruiting')->name('ajax.ik.recruiting.cancelRecruiting');
                Route::get('recruitingStepSubStepCheckActivities', 'RecruitingController@recruitingStepSubStepCheckActivities')->name('ajax.ik.recruiting.recruitingStepSubStepCheckActivities');
                Route::post('sendSms', 'RecruitingController@sendSms')->name('ajax.ik.recruiting.sendSms');

                Route::prefix('recruiting-step-sub-steps')->group(function () {
                    Route::any('index', 'RecruitingStepSubStepController@index')->name('ajax.ik.recruiting.recruiting-step-sub-steps.index');
                    Route::any('show', 'RecruitingStepSubStepController@show')->name('ajax.ik.recruiting.recruiting-step-sub-steps.show');
                    Route::any('save', 'RecruitingStepSubStepController@save')->name('ajax.ik.recruiting.recruiting-step-sub-steps.save');
                    Route::any('delete', 'RecruitingStepSubStepController@delete')->name('ajax.ik.recruiting.recruiting-step-sub-steps.delete');
                });

                Route::prefix('evaluation-parameters')->group(function () {
                    Route::any('index', 'EvaluationParameterController@index')->name('ajax.ik.recruiting.evaluation-parameters.index');
                    Route::any('show', 'EvaluationParameterController@show')->name('ajax.ik.recruiting.evaluation-parameters.show');
                    Route::any('save', 'EvaluationParameterController@save')->name('ajax.ik.recruiting.evaluation-parameters.save');
                    Route::any('delete', 'EvaluationParameterController@delete')->name('ajax.ik.recruiting.evaluation-parameters.delete');
                });

                Route::prefix('recruiting-steps')->group(function () {
                    Route::any('index', 'RecruitingStepController@index')->name('ajax.ik.recruiting.recruiting-steps.index');
                    Route::any('show', 'RecruitingStepController@show')->name('ajax.ik.recruiting.recruiting-steps.show');
                    Route::any('showByRecruitingId', 'RecruitingStepController@showByRecruitingId')->name('ajax.ik.recruiting.recruiting-steps.showByRecruitingId');
                    Route::any('save', 'RecruitingStepController@save')->name('ajax.ik.recruiting.recruiting-steps.save');
                });

                Route::prefix('reservation')->group(function () {
                    Route::any('calendar', 'RecruitingReservationController@calendar')->name('ajax.ik.recruiting.recruiting-reservations.calendar');
                    Route::any('show', 'RecruitingReservationController@show')->name('ajax.ik.recruiting.recruiting-reservations.show');
                    Route::any('save', 'RecruitingReservationController@save')->name('ajax.ik.recruiting.recruiting-reservations.save');
                    Route::any('control', 'RecruitingReservationController@control')->name('ajax.ik.recruiting.recruiting-reservations.control');
                });

                Route::prefix('recruiting-evaluation-parameters')->group(function () {
                    Route::any('save', 'RecruitingEvaluationParameterController@save')->name('ajax.ik.recruiting.recruiting-evaluation-parameters.save');
                    Route::any('delete', 'RecruitingEvaluationParameterController@delete')->name('ajax.ik.recruiting.recruiting-evaluation-parameters.delete');
                });
            });

            Route::prefix('employee-device')->group(function () {
                Route::get('getEmployeeDevice', 'EmployeeDeviceController@getEmployeeDevice')->name('ajax.ik.employee-device.getEmployeeDevice');
            });

        });

        Route::prefix('career')->group(function () {

            Route::prefix('position')->group(function () {
                Route::get('getPosition', 'PositionController@getPosition')->name('ajax.ik.career.position.getPosition');
            });

            Route::prefix('salary')->group(function () {
                Route::get('getSalary', 'SalaryController@getSalary')->name('ajax.ik.career.salary.getSalary');
            });

        });

        Route::prefix('punishment')->group(function () {

            Route::get('getPunishment', 'PunishmentController@getPunishment')->name('ajax.ik.punishment.getPunishment');

        });
    });

});
