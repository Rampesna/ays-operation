<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.survey.question.index', [
            'questions' => (new SurveySystemApi)->GetSurveyQuestionsList($request->code)['response'] ?? [],
            'surveyCode' => $request->code,
            'surveyName' => $request->name,
        ]);
    }
}
