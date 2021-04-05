<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function getSalary(Request $request)
    {
        return response()->json(Salary::find($request->salary_id), 200);
    }
}
