<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Api\Response;
use App\Http\Controllers\Employee\EmployeeService;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function report(Request $request)
    {
        if ($request->getMethod() != 'POST') {
            return response()->json(Response::MethodNotAllowed($request->getMethod()));
        }

        if (!$request->email) {
            return response()->json(Response::EmptyVariableResponse('email'));
        }

        if (!$request->start_date) {
            return response()->json(Response::EmptyVariableResponse('start_date'));
        }

        if (!$request->end_date) {
            return response()->json(Response::EmptyVariableResponse('end_date'));
        }

        $employee = Employee::where('email', $request->email)->first();

        if (!$employee) {
            return response()->json(Response::EmptyUserResponse());
        }

        return response()->json(Response::SuccessResponse((new EmployeeService)->report($employee, $request)));
    }
}
