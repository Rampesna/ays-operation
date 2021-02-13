<?php

namespace App\Http\Controllers\UserPanel\Report\Performance;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserPanel\Employee\EmployeeService;
use App\Models\Company;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create()
    {
        return view('pages.report.performance.create');
    }

    public function report(Request $request)
    {

        return view('pages.report.performance.report', [
            'employees' => (new EmployeeService)->performance($request),
            'companyJobAnalyses' => Company::find($request->company_id)->jobAnalyses()->whereBetween('date', [$request->start_date, $request->end_date])
        ]);
    }
}
