<?php

namespace App\Http\Controllers\Report\General;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generalReportThisMonth()
    {
        return view('pages.report.general.index', [
            'analyses' => (new GeneralService(date('Y-m-01'), date('Y-m-d')))->analyses(),
            'startDate' => date('Y-m-01'),
            'endDate' => date('Y-m-d')
        ]);
    }

    public function generalReportByDate(Request $request)
    {
        return view('pages.report.general.index', [
            'analyses' => (new GeneralService($request->start_date, $request->end_date))->analyses(),
            'startDate' => $request->start_date,
            'endDate' => $request->end_date
        ]);
    }
}
