<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\CallAnalysis;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeService
{
    public function getEmployeesByCompany($companyId)
    {
        if (is_null($companyId)) {
            return abort(404);
        }

        if (!auth()->user()->companies()->where('company_id', $companyId)->exists()) {
            return abort(403);
        }

        return Company::find($companyId)->employees()->with(['queues', 'competences'])->get();
    }

    public function show(Employee $employee, $request = null)
    {
        $startDate = !is_null($request) ? $request->start_date : date('Y-m-01');
        $endDate = !is_null($request) ? $request->end_date : date('Y-m-d');
        return [
            'employee' => $employee,
            'employeesCount' => Company::find($employee->company_id)->employees()->where('extension_number', '<>', '')->count(),
            'callAnalyses' => CallAnalysis::whereBetween('date', [
                $startDate,
                $endDate
            ])->
            orderBy('date', 'asc')->
            get(),
            'request' => $request
        ];
    }
}
