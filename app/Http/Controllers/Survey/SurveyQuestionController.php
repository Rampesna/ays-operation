<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\SurveyQuestionStoreRequest;
use App\Http\Requests\Survey\SurveyQuestionUpdateRequest;
use App\Http\Requests\Survey\SurveyStoreRequest;
use App\Http\Requests\Survey\SurveyUpdateRequest;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function Index()
    {
        return view('pages.survey.question.index');
    }

    public function Create()
    {
        return view('pages.survey.question.create');
    }

    public function Store(SurveyQuestionStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.survey.question.edit');
    }

    public function Update(SurveyQuestionUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
