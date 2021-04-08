<?php

namespace App\Http\Controllers\UserPanel\Report\Custom;

use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Api\OperationApi\SpecialReport\SpecialReportApi;
use App\Http\Controllers\Controller;
use App\Models\CustomReport;
use Illuminate\Http\Request;

class CustomReportController extends Controller
{
    public function index()
    {
        return view('pages.report.custom.index', [
            'customReports' => CustomReport::all()
        ]);
    }

    public function show(Request $request)
    {
        $api = new SpecialReportApi();
        $response = $api->GetSpecialReport($request->start_date, $request->end_date, CustomReport::find($request->report_id)->query)['response'] ?? [];
        return view('pages.report.custom.show', [
            'response' => $response
        ]);
    }
}
