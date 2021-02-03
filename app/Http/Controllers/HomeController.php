<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Employee\EmployeeService;
use App\Models\CallAnalysis;
use App\Models\JobAnalysis;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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

        if (!auth()->user()->companies()->where('company_id', $companyId)->exists()) {
            return abort(403);
        }

        return view('pages.dashboard.index', [
            'employees' => (new EmployeeService)->getEmployeesWithReportsByCompany($companyId),
            'companyId' => $companyId,
            'todayCalls' => CallAnalysis::
            where('company_id', $companyId)->
            whereBetween('date', [
                date('Y-m-d 00:00:00'),
                date('Y-m-d 23:59:59')
            ])->get(),
            'todayJobs' => JobAnalysis::
            where('company_id', $companyId)->
            whereBetween('date', [
                date('Y-m-d 00:00:00'),
                date('Y-m-d 23:59:59')
            ])->get(),
        ]);
    }
}
