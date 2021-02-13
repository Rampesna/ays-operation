<?php

namespace App\Http\Controllers\Ajax\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getMonthsByYears(Request $request)
    {
        setlocale(LC_ALL, 'tr_TR.UTF-8');
        $list = [];
        if (is_null($request->years) || count($request->years) == 0) {
            return response()->json($list, 200);
        } else {
            foreach ($request->years as $year) {
                for ($monthCounter = 1; $monthCounter <= 12; $monthCounter++) {
                    $list[] = [
                        "data" => "$year-$monthCounter",
                        "view" => strftime("%Y %B", strtotime($year . '-' . $monthCounter))
                    ];
                }
            }
            return response()->json($list, 200);
        }
    }

    public function getDaysByMonths(Request $request)
    {
        setlocale(LC_ALL, 'tr_TR.UTF-8');
        $list = [];
        if (is_null($request->months) || count($request->months) == 0) {
            return response()->json($list, 200);
        } else {
            foreach ($request->months as $month) {
                $dayStart = date('d', strtotime($month));
                $dayEnd = date('t', strtotime($month));
                for ($counter = $dayStart; $counter <= $dayEnd; $counter++) {
                    $list[] = [
                        "data" => "$month-$counter",
                        "view" => strftime("%Y %B %d - %A", strtotime($month . '-' . $counter))
                    ];
                }
            }
            return response()->json($list, 200);
        }
    }
}
