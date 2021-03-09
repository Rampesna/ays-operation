<?php

namespace App\Http\Controllers\Ajax\Santral;


use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Api\OperationApi\PersonReport\PersonReportApi;
use App\Http\Api\OperationApi\TvScreen\TvScreenApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index(Request $request)
    {
//        $api = new JobsSystemApi();
//        return $api->SetJobsExcel();

        $api = new OperationApi();
        return $api->GetDataScreening('2021-03-01', '2021-03-09');
    }
}
