<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Shift;

use App\Models\Company;
use App\Models\Shift;
use App\Models\ShiftGroup;

class ShiftService
{
    public function store(Shift $shift, $companyId, $employeeId, $startDate, $endDate, $breakDuration, $description = null)
    {
        $shift->company_id = $companyId;
        $shift->employee_id = $employeeId;
        $shift->start_date = $startDate;
        $shift->end_date = $endDate;
        $shift->break_duration = $breakDuration;
        $shift->description = $description;
        $shift->save();

        return $shift;
    }

    private function listCreator($companyId, $groupId)
    {
        return collect(
            $groupId == 0 ?
                Company::find($companyId)->employees :
                ShiftGroup::find($groupId)->employees
        );
    }

    public function controlSundayShift($date, $employee)
    {
        return Shift::
        where('employee_id', $employee->id)->
        whereBetween('start_date', [
            date('Y-m-d', strtotime($date . ' - 1 days')) . ' ' . '00:00:00',
            date('Y-m-d', strtotime($date . ' - 1 days')) . ' ' . '23:59:59'
        ])->
        first() ? true : false;
    }

    public function controlMondayShift($date, $employee)
    {
        return Shift::
            where('employee_id', $employee->id)->
            whereBetween('start_date', [
                date('Y-m-d', strtotime($date . ' + 1 days')) . ' ' . '00:00:00',
                date('Y-m-d', strtotime($date . ' + 1 days')) . ' ' . '23:59:59'
            ])->
            first() ?? null;
    }

    public function controlSaturdayShift($date, $employee)
    {
        return Shift::
            where('employee_id', $employee->id)->
            whereBetween('start_date', [
                date('Y-m-d', strtotime($date . ' - 1 days')) . ' ' . '00:00:00',
                date('Y-m-d', strtotime($date . ' - 1 days')) . ' ' . '23:59:59'
            ])->
            first() ?? null;
    }

    public function controlShift($date, $employee)
    {
        return Shift::
            where('employee_id', $employee->id)->
            whereBetween('start_date', [
                $date . ' ' . '00:00:00',
                $date . ' ' . '23:59:59'
            ])->
            first() ?? null;
    }

    public function deleteShift(Shift $shift)
    {
        $shift->delete();
    }

    public function progressByList($list, $request, $dayControlVariable, $date)
    {
        foreach ($list as $employee) {
            if ($request->after_sunday) {
                if ($dayControlVariable == "day1") {
                    if ($this->controlSundayShift($date, $employee)) {
                        continue;
                    }
                } else if ($dayControlVariable == "day0") {
                    if (!is_null($dayControlVariable)) {
                        if ($shiftController = $this->controlSaturdayShift($date, $employee)) {
                            $this->deleteShift($shiftController);
                        }
                    }
                }
            }

            if ($request->delete_if_exist) {
                if ($this->controlShift($date, $employee)) {
                    $this->deleteShift($this->controlShift($date, $employee));
                }
            }

            $startHourVariable = $dayControlVariable . "_start_hour";
            $endHourVariable = $dayControlVariable . "_end_hour";

            $this->store(
                new Shift,
                $request->company_id,
                $employee->id,
                $date . ' ' . $request->$startHourVariable . ':00',
                $date . ' ' . $request->$endHourVariable . ':00',
                $request->break_duration,
                $request->description
            );
        }
    }

    public function robot($request)
    {
        foreach ($request->days as $date) {
            $dayControlVariable = "day" . date('w', strtotime($date));
            if (!is_null($request->$dayControlVariable) && $request->$dayControlVariable == 'on') {
                if (!isset($list) || count($list) <= 0) {
                    $list = $this->listCreator($request->company_id, $request->group_id);
                }
                if ($request->add_type == 1) {
                    $this->progressByList($list, $request, $dayControlVariable, $date);
                } else {
                    if (count($list) < $request->per_day) {
                        $list = $this->listCreator($request->company_id, $request->group_id);
                    }
                    $randomEmployees = $list->random($request->per_day);
                    $this->progressByList($randomEmployees, $request, $dayControlVariable, $date);
                    foreach ($randomEmployees as $value) {
                        $list->forget($list->search(function ($val, $key) use ($value) {
                            return $val == $value;
                        }));
                    }
                }
            }
        }
    }
}
