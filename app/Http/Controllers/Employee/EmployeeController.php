<?php

namespace App\Http\Controllers\Employee;

use App\Models\CallAnalysis;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Queue;
use App\Models\Competence;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $companyId = $request->company_id ?? auth()->user()->companies()->first()->id;
        return view('pages.employee.index', [
            'employees' => (new EmployeeService)->getEmployeesByCompany($companyId),
            'company_id' => $companyId,
            'queues' => Queue::where('company_id', $companyId)->get(),
            'competences' => Competence::where('company_id', $companyId)->get()
        ]);
    }

    public function show(Employee $employee)
    {
        return view('pages.employee.show', (new EmployeeService)->show($employee));
    }

    public function showPost(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        return view('pages.employee.show', (new EmployeeService)->show($employee, $request));
    }
}
