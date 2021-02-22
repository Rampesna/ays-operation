<?php

namespace App\Http\Controllers\EmployeePanel\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function start(Request $request)
    {
        $timesheet = new Timesheet;
        $timesheet->task_id = $request->task_id;
        $timesheet->starter_type = 'App\Models\Employee';
        $timesheet->starter_id = auth()->user()->getId();
        $timesheet->start_time = date('Y-m-d H:i:s');
        $timesheet->save();

        return redirect()->back();
    }

    public function stop(Request $request)
    {
        $timesheet = Timesheet::find($request->timesheet_id);
        $timesheet->end_time = date('Y-m-d H:i:s');
        $timesheet->description = $request->description;
        $timesheet->save();

        return redirect()->back();
    }
}
