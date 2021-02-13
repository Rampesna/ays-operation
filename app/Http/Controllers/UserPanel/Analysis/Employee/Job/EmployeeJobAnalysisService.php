<?php

namespace App\Http\Controllers\UserPanel\Analysis\Employee\Job;


use App\Http\Api\AyssoftTakipApi;
use App\Models\Employee;
use App\Models\JobAnalysis;

class EmployeeJobAnalysisService
{

    private $api;

    public function __construct()
    {
        $this->api = new AyssoftTakipApi;
    }

    public function jobsAndActivities($request)
    {
        $response = $this->api->GetJobList($request->start_date, $request->end_date)['response'];
        foreach ($response as $data) {
            $employee = Employee::where('extension_number', $data['dahili'])->first();

            if (!is_null($employee)) {
                $jobAnalysis = JobAnalysis::
                where('employee_id', $employee->id)->
                where('date', date('Y-m-d', strtotime($data['column1'])))->
                first();

                if (is_null($jobAnalysis)) {
                    $jobAnalysis = new JobAnalysis;
                }

                $jobAnalysis->company_id = $employee->company_id;
                $jobAnalysis->employee_id = $employee->id;
                $jobAnalysis->date = date('Y-m-d', strtotime($data['column1']));

                if ($data['durum'] == 'FaliyetSayisi') {
                    $jobAnalysis->job_activity_count = $data['yapilanIsSayisi'];
                    is_null($jobAnalysis->job_complete_count) ? $jobAnalysis->job_complete_count = 0 : null;
                } else if ($data['durum'] == 'TamamlananIs') {
                    $jobAnalysis->job_complete_count = $data['yapilanIsSayisi'];
                    is_null($jobAnalysis->job_activity_count) ? $jobAnalysis->job_activity_count = 0 : null;
                }

                $jobAnalysis->save();
            }
        }
    }

    public function breaks($request)
    {
        $response = $this->api->GetPersonBreakList($request->start_date, $request->end_date)['response'];

        foreach ($response as $data) {
            $employee = Employee::where('extension_number', $data['dahili'])->first();

            if (!is_null($employee)) {
                $jobAnalysis = JobAnalysis::
                where('employee_id', $employee->id)->
                where('date', date('Y-m-d', strtotime($data['tarih'])))->
                first();

                if (is_null($jobAnalysis)) {
                    $jobAnalysis = new JobAnalysis;
                }

                $jobAnalysis->company_id = $employee->company_id;
                $jobAnalysis->employee_id = $employee->id;
                $jobAnalysis->date = date('Y-m-d', strtotime($data['tarih']));
                $jobAnalysis->used_break_duration = $data['mola'];
                $jobAnalysis->save();
            }
        }
    }

}
