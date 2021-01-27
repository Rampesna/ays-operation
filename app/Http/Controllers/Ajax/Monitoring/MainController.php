<?php

namespace App\Http\Controllers\Ajax\Monitoring;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function CallQueues()
    {
        return MonitoringService::CallQueuesService();
    }

    public function GetJobList()
    {
        return response()->json(MonitoringService::GetJobListService(), 200);
    }

    public function EmployeeAndJobTracking()
    {
        return response()->json(MonitoringService::EmployeeAndJobTrackingService(), 200);
    }

    public function ShiftEmployeesLastSunday()
    {
        return response()->json(MonitoringService::ShiftEmployeesLastSundayService(), 200);
    }

    public function Abandon()
    {
        return response()->json(MonitoringService::AbandonService(), 200);
    }

    public function GetPointDay()
    {
        return response()->json(MonitoringService::GetPointDayService());
    }

    public function GetPointWeek()
    {
        return response()->json(MonitoringService::GetPointWeekService());
    }

    public function GetMonthJobRanking()
    {
        return response()->json(MonitoringService::GetMonthJobRankingService());
    }
}
