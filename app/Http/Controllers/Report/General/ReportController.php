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
        return view('pages.report.general.index');
    }

    public function generalReportByDate()
    {

    }
}
