<?php

namespace App\Http\Controllers\Report\Performance;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employee\EmployeeService;
use App\Models\CallAnalysis;
use App\Models\Company;
use App\Models\Employee;
use App\Models\JobAnalysis;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\General;

class ReportController extends Controller
{
    public function create()
    {
        return view('pages.report.performance.create');
    }

    public function report(Request $request)
    {
        return view('pages.report.performance.report', [
            'employees' => (new EmployeeService)->performance($request)
        ]);
    }
}
