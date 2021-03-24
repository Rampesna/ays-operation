<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\Operation\OperationApi;
use App\Http\Api\OperationApi\PersonReport\PersonReportApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Api\OperationApi\TvScreen\TvScreenApi;
use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return (new SurveySystemApi)->GetSurveyAnswersConnectList(107);
    }
}
