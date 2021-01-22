<?php

namespace App\Http\Controllers\Report\Employee;

use App\Http\Controllers\Controller;
use App\Models\CallAnalysis;
use App\Models\Employee;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function comparisonReport()
    {
        return view('pages.report.employee.comparison');
    }

    public function comparisonReportShow(Request $request)
    {
        $callAnalyses = CallAnalysis::
        with('employee')->
        whereIn('employee_id', $request->employees)->
        whereBetween('date', [
            $request->start_date,
            $request->end_date,
        ])->
        get();

        $comparisons = [];

        foreach ($callAnalyses as $callAnalysis) {

            $comparisons[] = [
                "employee_id" => $callAnalysis->employee->id,
                "employee" => $callAnalysis->employee,
                "total_success_call_rate" => $callAnalyses->where('employee_id', $callAnalysis->employee_id)->sum('total_success_call') * 100 / ($callAnalyses->sum('total_success_call') / count($request->employees)),
                "total_success_call" => $callAnalyses->where('employee_id', $callAnalysis->employee_id)->sum('total_success_call'),
                "incoming_success_call" => $callAnalyses->where('employee_id', $callAnalysis->employee_id)->sum('incoming_success_call'),
                "outgoing_success_call" => $callAnalyses->where('employee_id', $callAnalysis->employee_id)->sum('outgoing_success_call')
            ];
        }

        $comparisons = collect($comparisons)->unique('employee_id')->sortByDesc('total_success_call_rate');

        return view('pages.report.employee.comparison-show', [
            'comparisons' => $comparisons,
            'request' => $request
        ]);
    }
}
