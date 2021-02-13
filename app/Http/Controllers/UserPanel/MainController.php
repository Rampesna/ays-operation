<?php

namespace App\Http\Controllers\UserPanel;

use App\Http\Controllers\UserPanel\Employee\EmployeeService;
use App\Models\CallAnalysis;
use App\Models\JobAnalysis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $companyId = $request->company_id ?? auth()->user()->companies()->first()->id;
        $startDate = $request->start_date ?? date('Y-m-d');
        $endDate = $request->end_date ?? date('Y-m-d');

        if (!auth()->user()->companies()->where('company_id', $companyId)->exists()) {
            return abort(403);
        }

        $employees = collect((new EmployeeService)->getEmployeesWithReportsByCompany($companyId, $startDate, $endDate));
        $employeeList = [];

        foreach ($employees as $employee) {
            $employeeList[$employee->id] = $employee;
            $employeeList[$employee->id]['total_success_call'] = CallAnalysis::where('employee_id', $employee->id)->whereBetween('date', [$startDate, $endDate])->sum('total_success_call') ?? 0;
            $employeeList[$employee->id]['job_activity_count'] = JobAnalysis::where('employee_id', $employee->id)->whereBetween('date', [$startDate, $endDate])->sum('job_activity_count') ?? 0;
            $employeeList[$employee->id]['job_complete_count'] = JobAnalysis::where('employee_id', $employee->id)->whereBetween('date', [$startDate, $endDate])->sum('job_complete_count') ?? 0;
        }

        return view('pages.dashboard.index', [
            'employees' => collect($employeeList)->sortByDesc('total_success_call'),
            'companyId' => $companyId,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'todayCalls' => CallAnalysis::
            where('company_id', $companyId)->
            whereBetween('date', [
                $startDate . ' 00:00:00',
                $endDate . ' 23:59:59'
            ])->get(),
            'todayJobs' => JobAnalysis::
            where('company_id', $companyId)->
            whereBetween('date', [
                $startDate . ' 00:00:00',
                $endDate . ' 23:59:59'
            ])->get(),
        ]);
    }
}
