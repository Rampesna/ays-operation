<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function updateImage(Request $request)
    {
        $employeeService = new EmployeeService;
        $employeeService->updateImage($request->employee_id, $request->file('image'));
    }

    public function deleteImage(Request $request)
    {
        $employeeService = new EmployeeService;
        $employeeService->deleteImage($request->employee_id);
    }
}
