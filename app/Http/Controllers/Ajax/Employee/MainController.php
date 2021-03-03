<?php

namespace App\Http\Controllers\Ajax\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CustomPercent;
use App\Models\Employee;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function updateQueues(Request $request)
    {
        try {
            $employee = Employee::find($request->employee_id);
            $employee->queues()->sync($request->queues);
            return response()->json([
                'response_status' => 'success',
                'content' => $employee->queues
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'response_status' => 'error',
                'content' => null
            ], 400);
        }
    }

    public function updateCompetences(Request $request)
    {
        try {
            $employee = Employee::find($request->employee_id);
            $employee->competences()->sync($request->competences);
            return response()->json([
                'response_status' => 'success',
                'content' => $employee->competences
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'response_status' => 'error',
                'content' => null
            ], 400);
        }
    }

    public function getEmployeesByCompanyId(Request $request)
    {
        return response()->json(Company::find($request->company_id)->employees()->where('extension_number', '<>', null)->get(), 200);
    }

    public function getAllEmployeesByCompanyId(Request $request)
    {
        return response()->json(Company::find($request->company_id)->employees()->orderBy('name', 'asc')->get(), 200);
    }

    public function createCustomPercent(Request $request)
    {
        $customPercent = CustomPercent::
        where('user_id', $request->user_id)->
        where('employee_id', $request->employee_id)->
        where('year', $request->year)->
        where('month', $request->month)->
        first();

        if (!is_null($customPercent)) {
            return response()->json([
                'status' => '400'
            ]);
        } else {
            $newCustomPercent = new CustomPercent;
            $newCustomPercent->user_id = $request->user_id;
            $newCustomPercent->employee_id = $request->employee_id;
            $newCustomPercent->year = $request->year;
            $newCustomPercent->month = $request->month;
            $newCustomPercent->percent = $request->percent;
            $newCustomPercent->save();

            return response()->json([
                'status' => '200'
            ]);
        }
    }

    public function editCustomPercent(Request $request)
    {
        return response()->json(CustomPercent::find($request->custom_percent_id));
    }

    public function updateCustomPercent(Request $request)
    {
        $customPercent = CustomPercent::find($request->custom_percent_id);

        $controlCustomPercent = CustomPercent::
        where('user_id', $customPercent->user_id)->
        where('employee_id', $customPercent->employee_id)->
        where('year', $request->year)->
        where('month', $request->month)->
        first();

        if (!is_null($controlCustomPercent)) {
            return response()->json([
                'status' => '400'
            ]);
        } else {
            $customPercent->year = $request->year;
            $customPercent->month = $request->month;
            $customPercent->percent = $request->percent;
            $customPercent->save();

            return response()->json([
                'status' => '200'
            ]);
        }
    }

    public function deleteCustomPercent(Request $request)
    {
        CustomPercent::find($request->custom_percent_id)->delete();
    }
}
