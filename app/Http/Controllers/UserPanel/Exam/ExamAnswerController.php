<?php

namespace App\Http\Controllers\UserPanel\Exam;

use App\Http\Requests\Exam\ExamStoreRequest;
use App\Http\Requests\Exam\ExamUpdateRequest;
use App\Http\Requests\ExamAnswerStoreRequest;
use App\Http\Requests\ExamAnswerUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamAnswerController extends Controller
{
    public function Index()
    {
        return view('pages.exam.answer.index');
    }

    public function Create()
    {
        return view('pages.exam.answer.create');
    }

    public function Store(ExamAnswerStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.exam.answer.create');
    }

    public function Update(ExamAnswerUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
