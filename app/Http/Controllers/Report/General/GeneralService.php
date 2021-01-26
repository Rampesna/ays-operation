<?php

namespace App\Http\Controllers\Report\General;

use App\Models\CallAnalysis;
use App\Models\JobAnalysis;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralService
{

    public $startDate;
    public $endDate;
    public $companyId;

    public function __construct($request)
    {
        $this->startDate = $request->start_date;
        $this->endDate = $request->end_date;
        $this->companyId = $request->company_id;
    }

    public function analyses()
    {
        return [
            'callAnalyses' => $this->callAnalyses(),
            'jobAnalyses' => $this->jobAnalyses(),
            'yearlyCallAnalyses' => $this->yearlyCallAnalyses(),
            'yearlyJobActivityAnalyses' => $this->yearlyJobActivityAnalyses(),
            'yearlyJobCompleteAnalyses' => $this->yearlyJobCompleteAnalyses()
        ];
    }

    private function callAnalyses()
    {
        return CallAnalysis::
        where('company_id', $this->companyId)->
        whereBetween('date', [
            $this->startDate,
            $this->endDate
        ])->get();
    }

    private function jobAnalyses()
    {
        return JobAnalysis::
        where('company_id', $this->companyId)->
        whereBetween('date', [
            $this->startDate,
            $this->endDate
        ])->get();
    }

    private function yearlyCallAnalyses()
    {
        return QueueAnalysis::
        select(DB::raw('day(date) as day_of_month, month(date) as month_of_year, (sum(total_incoming_call) + sum(total_outgoing_call)) as total_call'))->
        where('company_id', $this->companyId)->
        whereBetween('date', [
            date('Y-01-01', strtotime($this->startDate)),
            date('Y-12-31', strtotime($this->startDate))
        ])->
        groupByRaw('day(date), month(date)')->
        orderByRaw('month_of_year asc, day_of_month asc')->
        get();
    }

    private function yearlyJobActivityAnalyses()
    {
        return JobAnalysis::
        select(DB::raw('day(date) as day_of_month, month(date) as month_of_year, (sum(job_activity_count)) as total_job_activity'))->
        where('company_id', $this->companyId)->
        whereBetween('date', [
            date('Y-01-01', strtotime($this->startDate)),
            date('Y-12-31', strtotime($this->startDate))
        ])->
        groupByRaw('day(date), month(date)')->
        orderByRaw('month_of_year asc, day_of_month asc')->
        get();
    }

    private function yearlyJobCompleteAnalyses()
    {
        return JobAnalysis::
        select(DB::raw('day(date) as day_of_month, month(date) as month_of_year, (sum(job_complete_count)) as total_job_complete'))->
        where('company_id', $this->companyId)->
        whereBetween('date', [
            date('Y-01-01', strtotime($this->startDate)),
            date('Y-12-31', strtotime($this->startDate))
        ])->
        groupByRaw('day(date), month(date)')->
        orderByRaw('month_of_year asc, day_of_month asc')->
        get();
    }
}
