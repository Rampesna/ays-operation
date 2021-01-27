<?php

namespace App\Http\Controllers\Exam;

use App\Http\Requests\Exam\ExamStoreRequest;
use App\Http\Requests\Exam\ExamUpdateRequest;
use App\Http\Requests\ExamQuestionStoreRequest;
use App\Http\Requests\ExamQuestionUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamQuestionController extends Controller
{
    public function Index()
    {
        return view('pages.exam.question.index');
    }

    public function Create()
    {
        return view('pages.exam.question.create');
    }

    public function Store(ExamQuestionStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.exam.question.edit');
    }

    public function Update(ExamQuestionUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
