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
//        return (new SurveySystemApi)->GetSurveyReport($request->code, date('Y-m-d 09:00:00'), date('Y-m-d H:i:s'))['response'];
        $startDate = $request->start_date ?? null;
        $endDate = $request->end_date ?? null;

        return view('pages.survey.report.show.index', [
            'name' => $request->name,
            'surveyCode' => $request->code,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'list' => (new SurveySystemApi)->GetSurveyReport($request->code, $startDate, $endDate)['response'] ?? []
        ]);
    }
}
