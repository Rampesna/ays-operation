<?php

namespace App\Services;

use App\Http\Api\AyssoftIkApi;
use App\Http\Api\OperationApi\TvScreen\TvScreenApi;
use App\Models\CallAnalysis;
use App\Models\Company;
use App\Models\CustomPercent;
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

        return Company::find($companyId)->employees()->with(['queues', 'competences'])->orderBy('name', 'asc')->get();
    }

    public function getEmployeesWithReportsByCompany($companyId, $startDate, $endDate)
    {
        if (is_null($companyId)) {
            return abort(404);
        }

        if (!auth()->user()->companies()->where('company_id', $companyId)->exists()) {
            return abort(403);
        }

        return Company::find($companyId)->employees()->get();
    }

    public function report(Employee $employee, $request = null)
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
            'permit' => (new AyssoftIkApi)->GetEmployeePermit($employee->email, $startDate, $endDate)['content'] ?? '',
            'overtime' => (new AyssoftIkApi)->GetEmployeeOvertime($employee->email, $startDate, $endDate)['content'] ?? '',
            'customPercents' => CustomPercent::
            where('employee_id', $employee->id)->
            where('year', date('Y', strtotime($startDate)))->
            where('month', intval(date('m', strtotime($startDate))))->
            get(),
            'startDate' => $startDate,
            'endDate' => $endDate,
            'request' => $request
        ];
    }

    public function performance($request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        return Company::find($request->company_id)->employees()->with([
            'callAnalyses' => function ($callAnalyses) use ($startDate, $endDate) {
                $callAnalyses->whereBetween('date', [$startDate, $endDate]);
            },
            'jobAnalyses' => function ($jobAnalyses) use ($startDate, $endDate) {
                $jobAnalyses->whereBetween('date', [$startDate, $endDate]);
            },
            'customPercents' => function ($customPercents) use ($startDate) {
                $customPercents->where('year', date('Y', strtotime($startDate)))->where('month', intval(date('m', strtotime($startDate))));
            }
        ])->where('extension_number', '<>', null)->get();
    }

    public function sync($request)
    {
        $api = new TvScreenApi();
        $response = $api->GetStaffStatusList();
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

    public function store(Employee $employee, $request)
    {
        $employee->company_id = $request->company_id;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->identification_number = $request->identification_number;
        $employee->extension_number = $request->extension_number;

        $employee->image = $request->image;

        if (!is_null($request->file('image'))) {
            $imageName = strtotime(date("YmdHis")) . '.' . $request->file('image')->getClientOriginalExtension();
            request()->image->move(public_path('employee/images/'), $imageName);
            $employee->image = 'employee/images/' . $imageName;
        } else {
            if ($request->is_delete_image == 1) {
                $employee->image = null;
            }
        }

        $employee->title = $request->title;
        $employee->save();

        return $employee;
    }
}
