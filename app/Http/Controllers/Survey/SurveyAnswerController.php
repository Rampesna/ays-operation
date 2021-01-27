<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\SurveyAnswerStoreRequest;
use App\Http\Requests\Survey\SurveyAnswerUpdateRequest;
use App\Http\Requests\Survey\SurveyQuestionStoreRequest;
use App\Http\Requests\Survey\SurveyQuestionUpdateRequest;
use App\Http\Requests\Survey\SurveyStoreRequest;
use App\Http\Requests\Survey\SurveyUpdateRequest;
use Illuminate\Http\Request;

class SurveyAnswerController extends Controller
{
    public function Index()
    {
        return view('pages.survey.answer.index');
    }

    public function Create()
    {
        return view('pages.survey.answer.create');
    }

    public function Store(SurveyAnswerStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.survey.answer.edit');
    }

    public function Update(SurveyAnswerUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
