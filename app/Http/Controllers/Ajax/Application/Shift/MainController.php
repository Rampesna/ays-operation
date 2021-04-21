<?php

namespace App\Http\Controllers\Ajax\Application\Shift;

use App\Http\Controllers\Controller;
use App\Models\Shift;
use App\Models\ShiftGroup;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function store(Request $request)
    {
        try {
            $response = [];
            foreach ($request->employees as $employee) {
                $shift = new Shift;
                $shift->employee_id = $employee;
                $shift->start_date = $request->start_date;
                $shift->end_date = $request->end_date;
                $shift->break_duration = $request->break_duration;
                $shift->description = $request->description;
                $shift->save();
                $response[] = Shift::with('employee')->find($shift->id);
            }
            return response()->json($response, 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 400);
        }
    }

    public function edit(Request $request)
    {
        return response()->json(Shift::with([
            'employee'
        ])->find($request->shift_id), 200);
    }

    public function update(Request $request)
    {
        try {
            $shift = Shift::find($request->shift_id);
            $shift->start_date = $request->start_date;
            $shift->end_date = $request->end_date;
            $shift->break_duration = $request->break_duration;
            $shift->description = $request->description;
            $shift->save();
            return response()->json($shift, 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 400);
        }
    }

    public function delete(Request $request)
    {
        Shift::find($request->shift_id)->delete();
    }

    public function getShiftGroupsByCompanyId(Request $request)
    {
        return ShiftGroup::where('company_id', $request->company_id)->get();
    }
}
