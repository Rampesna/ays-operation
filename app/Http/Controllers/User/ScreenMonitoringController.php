<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\PersonReport\PersonReportApi;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class ScreenMonitoringController extends Controller
{
    public function index(Request $request)
    {
        $guidList = [];
        $employees = Employee::where('leave', 0)->get();

        foreach ($employees as $employee) {
            $employee->guid && $employee->guid != 0 ? $guidList[] = [
                "personId" => $employee->guid
            ] : null;
        }

        $startDate = $request->start_date ? date('Y-m-d H:i', strtotime($request->start_date)) : date('Y-m-d H:i', strtotime('+2 hours'));
        $endDate = $request->end_date ? date('Y-m-d H:i', strtotime($request->end_date)) : date('Y-m-d H:i', strtotime('+3 hours'));

        $list = ((array)json_decode((new PersonReportApi)->GetPersonScreenLogReport($startDate, $endDate, $guidList)->getBody()->getContents()))['response'];

        return view('pages.management-report.screen-monitoring.index', [
            'list' => $list,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'guidList' => $guidList
        ]);
    }

    public function details(Request $request)
    {
        $startDate = $request->start_date ? date('Y-m-d H:i', strtotime($request->start_date)) : date('Y-m-d H:i', strtotime('+2 hours'));
        $endDate = $request->end_date ? date('Y-m-d H:i', strtotime($request->end_date)) : date('Y-m-d H:i', strtotime('+3 hours'));

        $details = (new PersonReportApi)->GetSinglePersonLogReport($startDate, $endDate, $request->guid)['response'];

//        return $details;

        return view('pages.management-report.screen-monitoring.detail.index', [
            'details' => (new PersonReportApi)->GetSinglePersonLogReport($startDate, $endDate, $request->guid)['response'],
            'startDate' => $startDate,
            'endDate' => $endDate,
            'guid' => $request->guid
        ]);
    }
}
