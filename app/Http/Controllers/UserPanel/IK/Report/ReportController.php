<?php

namespace App\Http\Controllers\UserPanel\IK\Report;

use App\Http\Controllers\Controller;
use App\Models\Overtime;
use App\Models\OvertimeReason;
use App\Models\Permit;
use App\Models\PermitType;
use App\Models\Position;
use App\Services\OvertimeService;
use App\Services\PermitService;
use Illuminate\Http\Request;

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
                $position->duration = (new PermitService)->getDurationByMinutes(
                    Permit::where('employee_id', $position->employee_id)->
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
                    whereIn('type_id', $request->permit_types)->
                    get()->append('minutes')->sum('minutes')
                );
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
