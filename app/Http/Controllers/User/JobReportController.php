<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobReportController extends Controller
{
    public function index()
    {
        return view('pages.report.job.index');
    }

    public function show(Request $request)
    {
        $api = new OperationApi();
        return view('pages.report.job.show', [
            'screenings' => $api->GetDataScreening($request->start_date, $request->end_date)['response'] ?? [],
            'startDate' => $request->start_date,
            'endDate' => $request->end_date
        ]);
    }
}
