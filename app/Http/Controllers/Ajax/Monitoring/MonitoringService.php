<?php

namespace App\Http\Controllers\Ajax\Monitoring;

use App\Http\Api\AyssoftIkApi;
use App\Http\Api\AyssoftTakipLoginApi;
use Illuminate\Support\Facades\Http;

class MonitoringService
{
    public static function CallQueuesService()
    {
        return Http::get('http://uyumsoft.netasistan.com/home/dashboard/datarefresh/all', []);
    }

    public static function GetJobListService()
    {
        $api = new AyssoftTakipLoginApi();
        $tvScreenJobList = $api->TvScreenGetJobList();
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
        $ayssoftTakipApi = new AyssoftTakipLoginApi();
        $tvScreenGetStaffStatusList = $ayssoftTakipApi->TvScreenGetStaffStatusList();
        $tvScreenGetStaffStarList = $ayssoftTakipApi->TvScreenGetStaffStarList();

        $ayssoftIkApi = new AyssoftIkApi();
        $todayShiftEmployees = $ayssoftIkApi->ShiftEmployeesToday()['content'];
        $todayPermittedEmployees = $ayssoftIkApi->TodayPermittedEmployees()['content'];
        $todayOvertimePermittedEmployees = @$ayssoftIkApi->TodayOvertimePermittedEmployees()['content'];

        $blackTeam = $greenTeam = $blueTeam = $redTeam = $purpleTeam = $brownTeam = $otherTeams = [
            "users" => 0,
            "absentees" => 0,
            "arrived" => 0,
            "in_job" => 0,
            "not_job" => 0,
            "total_job" => 0,
            "support" => 0
        ];

        $needBreakCount = $foodBreakCount = $otherBreakCount = $activeUserCount = $absenteeUserCount = $allActiveUsers = 0;

        $teamList = [
            1 => 'blackTeam',
            2 => 'greenTeam',
            3 => 'blueTeam',
            4 => 'redTeam',
            5 => 'purpleTeam',
            9 => 'brownTeam'
        ];

        foreach ($tvScreenGetStaffStatusList['response'] as $user) {
            $teamName = array_key_exists($user['takimKodu'], $teamList) ? $teamList[$user['takimKodu']] : 'otherTeams';
            $$teamName["users"] += 1;
            $$teamName["total_job"] += $user['yapilanIs'];
            if ($user['durumKodu'] == 6) {
                $$teamName["absentees"] += 1;
                $absenteeUserCount += 1;
            } else {
                $$teamName["arrived"] += 1;
                $activeUserCount += 1;
            }
            if ($user['durumKodu'] == 1) {
                $$teamName["in_job"] += 1;
                $allActiveUsers += 1;
            }

            if ($user['durumKodu'] == 2) {
                $needBreakCount += 1;
                $$teamName["not_job"] += 1;
            } else if ($user['durumKodu'] == 3) {
                $foodBreakCount += 1;
                $$teamName["not_job"] += 1;
            } else if ($user['durumKodu'] == 8 || $user['durumKodu'] == 4 || $user['durumKodu'] == 5) {
                $otherBreakCount += 1;
                $user['durumKodu'] == 8 ? $$teamName["support"] += 1 : null;
            }
        }

        return [
            'blackTeam' => $blackTeam,
            'greenTeam' => $greenTeam,
            'blueTeam' => $blueTeam,
            'redTeam' => $redTeam,
            'purpleTeam' => $purpleTeam,
            'brownTeam' => $brownTeam,
            'totalUserCount' => count($tvScreenGetStaffStatusList['response']),
            'needBreakCount' => $needBreakCount,
            'foodBreakCount' => $foodBreakCount,
            'otherBreakCount' => $otherBreakCount,
            'allBreakCount' => $needBreakCount + $foodBreakCount + $otherBreakCount,
            'activeUserCount' => $activeUserCount,
            'absenteeUserCount' => $absenteeUserCount,
            'users' => $tvScreenGetStaffStatusList['response'],
            'starList' => $tvScreenGetStaffStarList['response'],
            'allActiveUsers' => $allActiveUsers,
            'todayShiftEmployees' => $todayShiftEmployees,
            'todayPermittedEmployees' => $todayPermittedEmployees,
            'todayOvertimePermittedEmployees' => $todayOvertimePermittedEmployees
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
        $aystakipapi = new AyssoftTakipLoginApi;
        $result = $aystakipapi->GetPointDay();
        return $result['response'];
    }

    public static function GetPointWeekService()
    {
        $aystakipapi = new AyssoftTakipLoginApi;
        $result = $aystakipapi->GetPointWeek();
        return $result['response'];
    }

    public static function GetMonthJobRankingService()
    {
        $aystakipapi = new AyssoftTakipLoginApi;
        $result = $aystakipapi->GetMonthJobRanking();
        return $result['response'];
    }
}
