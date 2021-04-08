<?php

namespace App\Http\Controllers\UserPanel\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyAnswerController extends Controller
{
    public function Index($id, $surveyCode)
    {
        return view('pages.survey.answer.index', [
            'answers' => (new SurveySystemApi)->GetSurveyAnswersList($id)['response'] ?? [],
            'products' => (new SurveySystemApi)->GetSurveyProductList()['response'] ?? [],
            'questionId' => $id,
            'surveyCode' => $surveyCode
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
