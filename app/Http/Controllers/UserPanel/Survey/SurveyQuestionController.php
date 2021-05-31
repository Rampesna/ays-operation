<?php

namespace App\Http\Controllers\UserPanel\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function Index(Request $request)
    {
        return view('pages.survey.question.index', [
            'questions' => (new SurveySystemApi)->GetSurveyQuestionsList($request->code)['response'] ?? [],
            'surveyCode' => $request->code,
            'surveyName' => $request->name,
        ]);
    }

    public function Create()
    {
        return view('pages.survey.question.create');
    }

    public function Store(Request $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.survey.question.edit');
    }

    public function Update(Request $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
