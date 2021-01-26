<?php

namespace App\Http\Controllers\Report\General;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use App\Models\QueueAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generalReportCreate()
    {
        return view('pages.report.general.create');
    }

    public function generalReport(Request $request)
    {
        return view('pages.report.general.index', [
            'analyses' => (new GeneralService($request))->analyses(),
            'startDate' => $request->start_date,
            'endDate' => $request->end_date
        ]);
    }
}
