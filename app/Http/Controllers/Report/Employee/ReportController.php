<?php

namespace App\Http\Controllers\Report\Employee;

use App\Http\Controllers\Controller;
use App\Models\CallAnalysis;
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
        whereIn('employee_id', $request->employees)->
        whereBetween('date', [
            $request->start_date,
            $request->end_date,
        ])->
        get();
        return $callAnalyses;
    }
}
