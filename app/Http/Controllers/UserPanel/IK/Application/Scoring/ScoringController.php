<?php

namespace App\Http\Controllers\UserPanel\IK\Application\Scoring;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\Position;
use Illuminate\Http\Request;

class ScoringController extends Controller
{
    public function index(Request $request)
    {
//        $positions = Position::select('employee_id', 'end_date')->with([
//            'employee'
//        ])->groupBy('employee_id', 'end_date')->get();
//        $date = $request->date ?? date('Y-m');
//        $lastDayOfMonth = intval(date('t', strtotime($date)));
//
//        foreach ($positions as $key => $position) {
//            $scores = [];
//            if (is_null($position->employee)) {
//                unset($positions[$key]);
//            } else if (!$position->end_date) {
//                for ($dayCounter = 1; $dayCounter <= $lastDayOfMonth; $dayCounter++) {
//                    $score = 8;
//                    $scores[$dayCounter] = $dayCounter * 5;
//                }
//                $position->scores = $scores;
//            } else if (date('Y-m', strtotime($date)) == date('Y-m', strtotime($position->end_date))) {
//                for ($dayCounter = 1; $dayCounter <= $lastDayOfMonth; $dayCounter++) {
//                    $scores[$dayCounter] = intval(date('d', strtotime($position->end_date))) <= $dayCounter ? ($dayCounter * 5) : '';
//                }
//                $position->scores = $scores;
//            } else {
//                unset($positions[$key]);
//            }
//        }
        return view('pages.ik.application.applications.scoring.index', [

        ]);
    }
}
