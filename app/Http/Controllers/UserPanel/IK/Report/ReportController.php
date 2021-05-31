<?php

namespace App\Http\Controllers\UserPanel\IK\Report;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\Overtime;
use App\Models\OvertimeReason;
use App\Models\Permit;
use App\Models\PermitType;
use App\Models\Position;
use App\Services\OvertimeService;
use App\Services\PermitService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.ik.report.index', [
            'overtimeReasons' => OvertimeReason::all(),
            'permitTypes' => PermitType::all()
        ]);
    }

    public function employeeReport(Request $request)
    {
        if ($request->report_type == 1) {
            $positions = Position::with([
                'employee' => function ($employee) {
                    $employee->with([
                        'personalInformations'
                    ]);
                }
            ])->where('end_date', null)->get();

            return view('pages.ik.report.reports.employee.gender-and-age', [
                'positions' => $positions
            ]);
        } else if ($request->report_type == 2) {
            $positions = Position::with([
                'employee' => function ($employee) {
                    $employee->with([
                        'personalInformations'
                    ]);
                }
            ])->where('end_date', null)->get();

            return view('pages.ik.report.reports.employee.education', [
                'positions' => $positions
            ]);
        } else if ($request->report_type == 3) {
            $positions = Position::with([
                'employee' => function ($employee) {
                    $employee->with([
                        'personalInformations'
                    ]);
                }
            ])->where('end_date', null)->get();

            return view('pages.ik.report.reports.employee.position', [
                'positions' => $positions
            ]);
        } else if ($request->report_type == 4) {
            $positions = Position::with([
                'employee' => function ($employee) {
                    $employee->with([
                        'personalInformations' => function ($personalInformation) {
                            $personalInformation->with([
                                'bloodGroup'
                            ]);
                        }
                    ]);
                }
            ])->where('end_date', null)->get();

            return view('pages.ik.report.reports.employee.blood-group', [
                'positions' => $positions
            ]);
        } else {
            return abort(404);
        }
    }

    public function managerialReport(Request $request)
    {
        if ($request->report_type == 1) {
            $permits = Permit::with(['employee', 'type'])->where(function ($query) use ($request) {
                $query->where(function ($start) use ($request) {
                    $start->whereBetween('start_date', [
                            date('Y-m-01', strtotime($request->date)),
                            date('Y-m-t', strtotime($request->date))]
                    );
                })->orWhere(function ($end) use ($request) {
                    $end->whereBetween('end_date', [
                            date('Y-m-01', strtotime($request->date)),
                            date('Y-m-t', strtotime($request->date))]
                    );
                });
            })->
            where('status_id', 2)->
            whereIn('type_id', $request->permit_types)->
            get();

            return view('pages.ik.report.reports.managerial.monthly-permit-report', [
                'permits' => $permits
            ]);
        } else if ($request->report_type == 2) {
            $overtimes = Overtime::with(['employee', 'reason'])->where(function ($query) use ($request) {
                $query->where(function ($start) use ($request) {
                    $start->whereBetween('start_date', [
                            date('Y-m-01', strtotime($request->date)),
                            date('Y-m-t', strtotime($request->date))]
                    );
                })->orWhere(function ($end) use ($request) {
                    $end->whereBetween('end_date', [
                            date('Y-m-01', strtotime($request->date)),
                            date('Y-m-t', strtotime($request->date))]
                    );
                });
            })->
            where('status_id', 2)->
            whereIn('reason_id', $request->overtime_reasons)->
            get();

            return view('pages.ik.report.reports.managerial.monthly-overtime-report', [
                'overtimes' => $overtimes
            ]);
        } else if ($request->report_type == 3) {
            $positions = Position::with(['employee'])->select('id', 'employee_id', 'end_date')->where('end_date', null)->get();
            foreach ($positions as $position) {

                $permits = Permit::where('employee_id', $position->employee_id)->
                where(function ($query) use ($request) {
                    $query->where(function ($start) use ($request) {
                        $start->whereBetween('start_date', [
                                date('Y-m-01 09:00:00', strtotime($request->date)),
                                date('Y-m-t 18:00:00', strtotime($request->date))]
                        );
                    })->orWhere(function ($end) use ($request) {
                        $end->whereBetween('end_date', [
                                date('Y-m-01 09:00:00', strtotime($request->date)),
                                date('Y-m-t 18:00:00', strtotime($request->date))]
                        );
                    });
                })->
                where('status_id', 2)->
                whereIn('type_id', $request->permit_types)->
                get();
                $totalMinutes = 0;
                $periods = [];

                foreach ($permits as $permit) {
                    if (
                        $permit->start_date >= date('Y-m-01 09:00:00') &&
                        $permit->end_date <= date('Y-m-t 18:00:00') &&
                        date('Y-m-d', strtotime($permit->start_date)) == date('Y-m-d', strtotime($permit->end_date))
                    ) {
                        $totalMinutes += Carbon::createFromDate($permit->start_date)->diffInMinutes($permit->end_date) >= 480 ?
                            480 :
                            Carbon::createFromDate($permit->start_date)->diffInMinutes($permit->end_date);
                    } else {
                        if ($permit->start_date < date('Y-m-01 09:00:00', strtotime($request->date))) {
                            $periodStartDate = date('Y-m-01 09:00:00', strtotime($request->date));
                            $periodStartType = 1;
                        } else {
                            $periodStartDate = $permit->start_date;
                            $periodStartType = 0;
                        }

                        if ($permit->end_date > date('Y-m-t 18:00:00', strtotime($request->date))) {
                            $periodEndDate = date('Y-m-01 18:00:00', strtotime($request->date));
                            $periodEndType = 1;
                        } else {
                            $periodEndDate = $permit->end_date;
                            $periodEndType = 0;
                        }

                        $period = Carbon::createFromDate($periodStartDate)->diffInDays($periodEndDate);

                        for ($counter = 0; $counter <= $period; $counter++) {
                            if ($counter == 0 && $periodStartType == 0) {
                                $totalMinutes +=
                                    Carbon::createFromDate($permit->start_date)->diffInMinutes(date('Y-m-d 18:00:00', strtotime($permit->start_date))) >= 480 ?
                                        480 :
                                        Carbon::createFromDate($permit->start_date)->diffInMinutes(date('Y-m-d 18:00:00', strtotime($permit->start_date)));
                            } else if ($counter == $period && $periodEndType == 0) {
                                $totalMinutes +=
                                    Carbon::createFromDate(date('Y-m-d 09:00:00', strtotime($permit->end_date)))->diffInMinutes($permit->end_date) >= 480 ?
                                        480 :
                                        Carbon::createFromDate(date('Y-m-d 09:00:00', strtotime($permit->end_date)))->diffInMinutes($permit->end_date);
                            } else {
                                $totalMinutes += 480;
                            }
                        }
                    }
                }

                $position->duration = General::getDurationByMinutes($totalMinutes);
            }

            return view('pages.ik.report.reports.managerial.monthly-total-permit-report', [
                'positions' => $positions
            ]);
        } else if ($request->report_type == 4) {

            $positions = Position::with(['employee'])->select('id', 'employee_id', 'end_date')->where('end_date', null)->get();

            foreach ($positions as $position) {
                $position->duration = (new OvertimeService)->getDurationByMinutes(
                    Overtime::where('employee_id', $position->employee_id)->
                    where(function ($query) use ($request) {
                        $query->where(function ($start) use ($request) {
                            $start->whereBetween('start_date', [
                                    date('Y-m-01', strtotime($request->date)),
                                    date('Y-m-t', strtotime($request->date))]
                            );
                        })->orWhere(function ($end) use ($request) {
                            $end->whereBetween('end_date', [
                                    date('Y-m-01', strtotime($request->date)),
                                    date('Y-m-t', strtotime($request->date))]
                            );
                        });
                    })->
                    where('status_id', 2)->
                    whereIn('reason_id', $request->overtime_reasons)->
                    get()->append('minutes')->sum('minutes')
                );
            }

            return view('pages.ik.report.reports.managerial.monthly-total-overtime-report', [
                'positions' => $positions
            ]);
        } else {
            return abort(404);
        }
    }
}
