<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\Survey\SurveyStoreRequest;
use App\Http\Requests\Survey\SurveyUpdateRequest;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function Index()
    {
        return view('pages.survey.index');
    }

    public function Create()
    {
        return view('pages.survey.create');
    }

    public function Store(SurveyStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.survey.edit');
    }

    public function Update(SurveyUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
