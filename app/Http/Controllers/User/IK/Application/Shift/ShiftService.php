<?php

namespace App\Http\Controllers\User\IK\Application\Shift;

use App\Models\Company;
use App\Models\Shift;
use App\Models\ShiftGroup;
use Illuminate\Support\Carbon;

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

    private function listCreator($groupId)
    {
        return collect(ShiftGroup::find($groupId)->employees);
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

    public function progressByList($list, $shiftGroup, $dayControlVariable, $dayDate)
    {
        foreach ($list as $employee) {
            if ($shiftGroup->after_sunday) {
                if ($dayControlVariable == "day1") {
                    if ($this->controlSundayShift($dayDate, $employee)) {
                        continue;
                    }
                } else if ($dayControlVariable == "day0") {
                    if (!is_null($dayControlVariable)) {
                        if ($shiftController = $this->controlSaturdayShift($dayDate, $employee)) {
                            $this->deleteShift($shiftController);
                        }
                    }
                }
            }

            if ($shiftGroup->delete_if_exist) {
                if ($this->controlShift($dayDate, $employee)) {
                    $this->deleteShift($this->controlShift($dayDate, $employee));
                }
            }

            $startTimeVariable = $dayControlVariable . "_start_time";
            $endTimeVariable = $dayControlVariable . "_end_time";

            $this->store(
                new Shift,
                $shiftGroup->company_id,
                $employee->id,
                $dayDate . ' ' . $shiftGroup->$startTimeVariable,
                $dayDate . ' ' . $shiftGroup->$endTimeVariable,
                $shiftGroup->break_duration,
                $shiftGroup->description
            );
        }
    }

    public function robot($request)
    {
        $shiftGroups = ShiftGroup::orderBy('order', 'asc')->get();
        $date = $request->date;

        foreach ($shiftGroups as $shiftGroup) {
            $startDay = 1;
            $endDay = date('t', strtotime($request->date));
            for ($day = $startDay; $day <= $endDay; $day++) {
                $dayDate = $request->date . '-' . sprintf("%02s", $day);
                $dayControlVariable = "day" . date('w', strtotime($dayDate));
                if ($shiftGroup->$dayControlVariable === 1) {
                    if (!isset($list) || count($list) <= 0) {
                        $list = $this->listCreator($shiftGroup->id);
                    }
                    if ($shiftGroup->add_type === 1) {
                        $this->progressByList($list, $shiftGroup, $dayControlVariable, $dayDate);
                    } else {
                        if (count($list) < $request->per_day) {
                            $list = $this->listCreator($shiftGroup->id);
                        }

                        if ($shiftGroup->set_group_weekly === 1) {
                            if (Carbon::createFromDate($dayDate)->weekNumberInMonth == Carbon::createFromDate(date('Y-m-d', strtotime('+1 day', strtotime($dayDate))))->weekNumberInMonth) {
                                if (!isset($randomEmployees)) {
                                    $randomEmployees = $list->random($shiftGroup->per_day);
                                }
                            }
                        }

                        if (!isset($randomEmployees)) {
                            $randomEmployees = $list->random($shiftGroup->per_day);
                        } else {
                            if ($shiftGroup->set_group_weekly === 1) {
                                if (Carbon::createFromDate($dayDate)->weekNumberInMonth == Carbon::createFromDate(date('Y-m-d', strtotime('-1 day', strtotime($dayDate))))->weekNumberInMonth || intval(date('d', strtotime($dayDate))) == 1) {
                                    $this->progressByList($randomEmployees, $shiftGroup, $dayControlVariable, $dayDate);
                                } else {
                                    foreach ($randomEmployees as $value) {
                                        $list->forget($list->search(function ($val, $key) use ($value) {
                                            return $val == $value;
                                        }));
                                    }
                                    if (count($list) < $shiftGroup->per_day) {
                                        $list = $this->listCreator($shiftGroup->id);
                                    }
                                    $randomEmployees = $list->random($shiftGroup->per_day);
                                    $this->progressByList($randomEmployees, $shiftGroup, $dayControlVariable, $dayDate);
                                }
                            } else {
                                $this->progressByList($randomEmployees, $shiftGroup, $dayControlVariable, $dayDate);
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
        }


//        foreach ($request->days as $date) {
//            $dayControlVariable = "day" . date('w', strtotime($date));
//            if (!is_null($request->$dayControlVariable) && $request->$dayControlVariable == 'on') {
//                if (!isset($list) || count($list) <= 0) {
//                    $list = $this->listCreator($request->company_id, $request->group_id);
//                }
//                if ($request->add_type == 1) {
//                    $this->progressByList($list, $request, $dayControlVariable, $date);
//                } else {
//                    if (count($list) < $request->per_day) {
//                        $list = $this->listCreator($request->company_id, $request->group_id);
//                    }
//                    $randomEmployees = $list->random($request->per_day);
//                    $this->progressByList($randomEmployees, $request, $dayControlVariable, $date);
//                    foreach ($randomEmployees as $value) {
//                        $list->forget($list->search(function ($val, $key) use ($value) {
//                            return $val == $value;
//                        }));
//                    }
//                }
//            }
//        }
    }
}
