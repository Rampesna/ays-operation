<?php

namespace App\Http\Controllers\UserPanel\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyAnswerController extends Controller
{
    public function Index(Request $request)
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

    public function Create()
    {
        return view('pages.survey.answer.create');
    }

    public function Store(Request $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.survey.answer.edit');
    }

    public function Update(Request $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
