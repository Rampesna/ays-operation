<?php

namespace App\Http\Controllers\UserPanel\IK\Application\PermitProgress;

use App\Http\Controllers\Controller;
use App\Models\Permit;
use App\Models\PermitType;
use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PermitProgressController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.ik.application.applications.permit-progress.index', [
            'permitTypes' => PermitType::all()
        ]);
    }

    public function report(Request $request)
    {
        $employeeIds = Position::with([
            'employee'
        ])->orderBy('start_date')->get()->groupBy('employee_id')->all();

        $employeePermitProgresses = [];
        foreach ($employeeIds as $employeePositions) {
            $position = $employeePositions->first();

            if ($position->employee) {
                $permits = Permit::
                where('employee_id', $position->employee_id)->
                whereIn('type_id', $request->permit_types)->
                whereBetween('start_date', [
                    $position->start_date,
                    date('Y-m-d'),
                ])->
                where('status_id', 2)->
                get();

                $workYear = Carbon::createFromDate($position->start_date)->diffInYears(date('Y-m-d'));
                $deservedYearlyPermitDays = $workYear * 14;
                $usedYearlyPermitDays = 0;

                $usedYearlyPermits = Permit::
                where('employee_id', $position->employee_id)->
                where('type_id', 5)->
                where('status_id', 2)->
                get();

                foreach ($usedYearlyPermits as $usedYearlyPermit) {
                    $usedYearlyPermitDays += Carbon::createFromDate($usedYearlyPermit->start_date)->diffInDays($usedYearlyPermit->end_date) + 1;
                }

                $totalMinutes = 0;

                foreach ($permits as $permit) {
                    $totalMinutes += $permit->getMinutesAttribute();
                }

                $totalHours = $totalMinutes / 60;
                $totalDays = intval($totalHours / 8);
                $residualHours = intval($totalHours - ($totalDays * 8));

                $employeePermitProgresses[$position->employee_id] = [
                    "name" => ucwords($position->employee->name),
                    "job_start_date" => $position->start_date,
                    "total_permit_day" => $totalDays . ' Gün, ' . intval($residualHours) . ' Saat',
                    "deserved_yearly_permit_day" => $deservedYearlyPermitDays,
                    "used_yearly_permit_day" => $usedYearlyPermitDays,
                    "total_permit_minutes" => $totalMinutes . ' Dakika',
                    "permit_can_start_date" =>
                        $deservedYearlyPermitDays > $usedYearlyPermitDays ?
                            date('Y-m-d', strtotime($position->start_date . " +" . $workYear . " year +" . $totalDays . " day")) :
                            date('Y-m-d', strtotime($position->start_date . " +" . ($workYear + 1) . " year +" . $totalDays . " day")),
                ];
            }
        }

        return view('pages.ik.application.applications.permit-progress.report.index', [
            'employeePermitProgresses' => $employeePermitProgresses
        ]);
    }
}
