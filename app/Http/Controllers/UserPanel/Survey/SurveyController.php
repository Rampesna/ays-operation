<?php

namespace App\Http\Controllers\UserPanel\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function Index()
    {
        return view('pages.survey.script.index', [
            'surveyList' => (new SurveySystemApi)->GetSurveyList()['response']
        ]);
    }

    public function Create()
    {
        return view('pages.survey.create');
    }

    public function Store(Request $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.survey.edit');
    }

    public function Update(Request $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
