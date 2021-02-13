<?php

namespace App\Http\Controllers\UserPanel\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\SurveyJobGroupStoreRequest;
use App\Http\Requests\Survey\SurveyJobGroupUpdateRequest;
use App\Http\Requests\Survey\SurveyQuestionStoreRequest;
use App\Http\Requests\Survey\SurveyQuestionUpdateRequest;
use App\Http\Requests\Survey\SurveyStoreRequest;
use App\Http\Requests\Survey\SurveyUpdateRequest;
use Illuminate\Http\Request;

class SurveyJobGroupController extends Controller
{
    public function Index()
    {
        return view('pages.survey.job-group.index');
    }

    public function Create()
    {
        return view('pages.survey.job-group.create');
    }

    public function Store(SurveyJobGroupStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.survey.job-group.edit');
    }

    public function Update(SurveyJobGroupUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
