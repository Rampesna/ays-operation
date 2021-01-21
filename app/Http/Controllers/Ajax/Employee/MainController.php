<?php

namespace App\Http\Controllers\Ajax\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;
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
        return response()->json(Company::find($request->company_id)->employees, 200);
    }
}
