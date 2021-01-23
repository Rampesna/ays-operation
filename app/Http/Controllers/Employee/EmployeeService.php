<?php

namespace App\Http\Controllers\Employee;

use App\Http\Api\AyssoftTakipApi;
use App\Models\CallAnalysis;
use App\Models\Company;
use App\Models\Employee;
use App\Models\JobAnalysis;

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
            'jobAnalyses' => JobAnalysis::whereBetween('date', [
                $startDate,
                $endDate
            ])->
            orderBy('date', 'asc')->
            get(),
            'request' => $request
        ];
    }

    public function sync($request)
    {
        $api = new AyssoftTakipApi();
        $response = $api->TvScreenGetStaffStatusList();
        $employeesFromApi = $response['response'];
        foreach ($employeesFromApi as $employeeFromApi) {
            $employee = Employee::where('extension_number', $employeeFromApi['dahili'])->first();
            if (is_null($employee)) {
                $employee = new Employee;
                $employee->company_id = $request->company_id;
                $employee->name = $employeeFromApi['kullaniciAdSoyad'];
                $employee->email = $employeeFromApi['kullaniciMail'];
                $employee->extension_number = $employeeFromApi['dahili'];
                $employee->save();
            } else if ($request->force == 1) {
                $employee->name = $employeeFromApi['kullaniciAdSoyad'];
                $employee->email = $employeeFromApi['kullaniciMail'];
                $employee->save();
            }
        }
        return response()->json('success', 200);
    }
}
