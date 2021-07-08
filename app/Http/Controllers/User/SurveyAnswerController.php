<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyAnswerController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.survey.answer.index', [
            'answers' => (new SurveySystemApi)->GetSurveyAnswersList($request->id)['response'] ?? [],
            'products' => (new SurveySystemApi)->GetSurveyProductList()['response'] ?? [],
            'questionId' => $request->id,
            'surveyCode' => $request->surveyCode,
            'surveyName' => $request->surveyName,
            'questionName' => $request->questionName
        ]);
    }
}
