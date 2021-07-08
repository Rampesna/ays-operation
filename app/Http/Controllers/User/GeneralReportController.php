<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\GeneralReportService;
use Illuminate\Http\Request;

class GeneralReportController extends Controller
{
    public function generalReportCreate()
    {
        return view('pages.report.general.create');
    }

    public function generalReport(Request $request)
    {
        return view('pages.report.general.index', [
            'analyses' => (new GeneralReportService($request))->analyses(),
            'startDate' => $request->start_date,
            'endDate' => $request->end_date
        ]);
    }
}
