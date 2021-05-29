<?php

namespace App\Http\Controllers\UserPanel\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyReportController extends Controller
{
    public function index()
    {
        return view('pages.survey.report.index');
    }

    public function show(Request $request)
    {
//        return (new SurveySystemApi)->GetSurveyReport($request->code)['response'];
        return view('pages.survey.report.show.index', [
            'name' => $request->name,
            'surveyCode' => $request->code,
            'list' => (new SurveySystemApi)->GetSurveyReport($request->code)['response'] ?? []
        ]);
    }
}
