<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\OperationApi;
use App\Http\Api\OperationApi\PersonReport\PersonReportApi;
use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeMonitoringController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->start_date ? date('Y-m-d H:i', strtotime($request->start_date)) : date('Y-m-d H:i', strtotime('+2 hours'));
        $endDate = $request->end_date ? date('Y-m-d H:i', strtotime($request->end_date)) : date('Y-m-d H:i', strtotime('+3 hours'));

        return view('pages.management-report.employee-monitoring.index', [
            'list' => (new PersonReportApi)->GetPersonLogReport($startDate, $endDate)['response'],
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }
}
