<?php

namespace App\Http\Controllers\Ajax\Monitoring;

use App\Http\Api\AyssoftIkApi;
use App\Http\Api\NetsantralApi;
use App\Http\Api\OperationApi\TvScreen\TvScreenApi;
use App\Models\Permit;
use App\Models\Shift;
use Illuminate\Support\Facades\Http;

class MonitoringService
{
    public static function CallQueuesService()
    {
        $api = new NetsantralApi();
        return $api->CallQueues();
    }

    public static function GetJobListService()
    {
        $api = new TvScreenApi();
        $tvScreenJobList = $api->GetJobList();

        if (is_null($tvScreenJobList['response'])) {
            return response()->json($tvScreenJobList, 200);
        } else {
            $totalNewJobs = 0;
            foreach ($tvScreenJobList['response'] as $data) {
                $totalNewJobs += $data['durum'] == "True" ? $data['sayi'] : 0;
            }
            return [
                'responseBody' => $tvScreenJobList['response'],
                'totalNewJobs' => $totalNewJobs
            ];
        }
    }

    public static function EmployeeAndJobTrackingService()
    {
        $api = new TvScreenApi();
        $tvScreenGetStaffStatusList = $api->GetStaffStatusList();
        $tvScreenGetStaffStarList = $api->GetStaffStarList();

        $todayShiftEmployees = Shift::with([
            'employee'
        ])->whereBetween('start_date', [
            date('Y-m-d 00:00:00'),
            date('Y-m-d 23:59:59')
        ])->
        where(function ($shifts) {
            $shifts->
            where('start_date', '<>', date('Y-m-d 09:00:00'))->
            orWhere('end_date', '<>', date('Y-m-d 18:00:00'));
        })->
        get();

        $todayPermittedEmployees = Permit::with([
            'employee'
        ])->where(function ($query) {
            $query->where(function ($between) {
                $between->where('start_date', '<=', date('Y-m-d 09:00:00'))->
                where('end_date', '>=', date('Y-m-d 18:00:00'));
            })->orWhere(function ($same) {
                $same->where('start_date', '>=', date('Y-m-d 09:00:00'))->
                where('end_date', '<=', date('Y-m-d 18:00:00'));
            });
        })->get();

        $oldShiftEmployeeList = Shift::with([
            'employee'
        ])->whereBetween('start_date', [
            date('Y-m-d 00:00:00', strtotime('+1 days')),
            date('Y-m-d 23:59:59', strtotime('+1 days'))
        ])->
        where(function ($shifts) {
            $shifts->
            where('start_date', '<>', date('Y-m-d 09:00:00'))->
            orWhere('end_date', '<>', date('Y-m-d 18:00:00'));
        })->
        get();

        $needBreakCount = $foodBreakCount = $otherBreakCount = $activeUserCount = $absenteeUserCount = $allActiveUsers = 0;

        foreach ($tvScreenGetStaffStatusList['response'] as $user) {
            if ($user['durumKodu'] == 6) {
                $absenteeUserCount += 1;
            } else {
                $activeUserCount += 1;
            }

            if ($user['durumKodu'] == 1) {
                $allActiveUsers += 1;
            }

            if ($user['durumKodu'] == 2) {
                $needBreakCount += 1;
            } else if ($user['durumKodu'] == 3) {
                $foodBreakCount += 1;
            } else if ($user['durumKodu'] == 8 || $user['durumKodu'] == 4 || $user['durumKodu'] == 5) {
                $otherBreakCount += 1;
            }
        }

        return [
            'totalUserCount' => count($tvScreenGetStaffStatusList['response']),
            'needBreakCount' => $needBreakCount,
            'foodBreakCount' => $foodBreakCount,
            'otherBreakCount' => $otherBreakCount,
            'allBreakCount' => $needBreakCount + $foodBreakCount + $otherBreakCount,
            'activeUserCount' => $activeUserCount,
            'absenteeUserCount' => $absenteeUserCount,
            'users' => $tvScreenGetStaffStatusList['response'],
            'allActiveUsers' => $allActiveUsers,
            'todayShiftEmployees' => $todayShiftEmployees,
            'todayPermittedEmployees' => $todayPermittedEmployees,
            'oldShiftEmployeeList' => $oldShiftEmployeeList
        ];
    }

    public static function AbandonService()
    {
        $params = [
            "draw" => "1",
            "columns[0][data]" => "callerNumber",
            "columns[1][data]" => "standByTime",
            "columns[2][data]" => "callTime",
            "columns[3][data]" => "status",
            "columns[4][data]" => "result",
            "columns[5][data]" => "callbackTime",
            "columns[6][data]" => "queue",
            "columns[7][data]" => "callbackAgent",
            "order[0][column]" => "2",
            "order[0][dir]" => "desc",
            "start" => "0",
            "length" => "100",
            "_csrf_token" => "istatistik_detay_getir",
            "t1" => date('d.m.Y'),
            "t2" => date('d.m.Y'),
            "departman" => "EfaturaEarsiv",
            "tip" => "abandon",
            "startHour" => "",
            "endHour" => "",
            "indate" => "",
            "maxbekleme" => ""
        ];

        $params["departman"] = "IUyum";
        $response["iuyum"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        $params["departman"] = "EfaturaEarsiv";
        $response["efaturaearsiv"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        $params["departman"] = "eIrsaliyeDestek";
        $response["eirsaliyedestek"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        $params["departman"] = "HesapAktivasyon";
        $response["hesapaktivasyon"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        $params["departman"] = "eIsaliyeHesapAcilis";
        $response["eirsaliyehesapacilis"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        $params["departman"] = "Edefter";
        $response["edefter"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        $params["departman"] = "EdefterImzalama";
        $response["edefterimzalama"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        $params["departman"] = "EkoCari";
        $response["ekocari"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        $params["departman"] = "Yedek";
        $response["yedek"] = Http::asForm()->post('http://uyumsoft.netasistan.com/istatistik/departman/detay', $params)["data"];

        return $response;
    }

    public static function ShiftEmployeesLastSundayService()
    {
        $ayssoftIkApi = new AyssoftIkApi();
        $shiftEmployeesLastSunday = $ayssoftIkApi->ShiftEmployeesLastSunday();

        return 1;
    }

    public static function GetPointDayService()
    {
        $api = new TvScreenApi();
        $result = $api->GetPointDay();
        return $result['response'];
    }

    public static function GetPointWeekService()
    {
        $api = new TvScreenApi();
        $result = $api->GetPointWeek();
        return $result['response'];
    }

    public static function GetMonthJobRankingService()
    {
        $api = new TvScreenApi();
        $result = $api->GetMonthJobRanking();
        return $result['response'];
    }
}
