<?php

namespace App\Http\Controllers\User\Application\CustomReport;

use App\Http\Controllers\Controller;
use App\Models\CustomReport;

class CustomReportController extends Controller
{
    public function index()
    {
        return view('pages.application.applications.custom-report.index', [
            'customReports' => CustomReport::all()
        ]);
    }
}
