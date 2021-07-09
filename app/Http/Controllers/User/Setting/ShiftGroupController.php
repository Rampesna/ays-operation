<?php

namespace App\Http\Controllers\User\Setting;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Position;
use App\Models\ShiftGroup;
use Illuminate\Http\Request;
use App\Services\ShiftGroupService;

class ShiftGroupController extends Controller
{
    public function index()
    {
        return view('pages.setting.shift-group.index', [
            'groups' => ShiftGroup::with(['company' => function ($company) {
                $company->with('employees');
            }])->get()
        ]);
    }

    public function create()
    {
        return view('pages.setting.shift-group.create.index', [
            'employees' => Employee::whereIn('id', Position::where('end_date', null)->pluck('employee_id')->toArray())->get()
        ]);
    }

    public function edit(Request $request)
    {
        return view('pages.setting.shift-group.edit.index', [
            'shiftGroup' => ShiftGroup::find($request->id),
            'employees' => Employee::whereIn('id', Position::where('end_date', null)->pluck('employee_id')->toArray())->get()
        ]);
    }

    public function store(Request $request)
    {
        $shiftGroupService = new ShiftGroupService;
        $shiftGroupService->setShiftGroup($request->id ? ShiftGroup::find($request->id) : new ShiftGroup);
        $shiftGroupService->save(
            $request->company_id,
            $request->name,
            $request->add_type,
            $request->per_day,
            $request->break_duration,
            $request->description,
            $request->delete_if_exist,
            $request->after_sunday,
            $request->set_group_weekly,
            $request->day0,
            $request->day0_start_time,
            $request->day0_end_time,
            $request->day1,
            $request->day1_start_time,
            $request->day1_end_time,
            $request->day2,
            $request->day2_start_time,
            $request->day2_end_time,
            $request->day3,
            $request->day3_start_time,
            $request->day3_end_time,
            $request->day4,
            $request->day4_start_time,
            $request->day4_end_time,
            $request->day5,
            $request->day5_start_time,
            $request->day5_end_time,
            $request->day6,
            $request->day6_start_time,
            $request->day6_end_time,
            $request->employees
        );
    }

//    public function edit(Request $request)
//    {
//        return response()->json(ShiftGroup::find($request->id), 200);
//    }

    public function update(Request $request)
    {
        $queue = (new ShiftGroupService)->save(ShiftGroup::find($request->id), $request);
        return response()->json($queue, 200);
    }

    public function delete(Request $request)
    {
        (new ShiftGroupService)->destroy(ShiftGroup::find($request->id));
        return response()->json('success', 200);
    }
}
