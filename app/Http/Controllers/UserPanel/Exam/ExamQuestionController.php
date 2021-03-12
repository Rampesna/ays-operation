<?php

namespace App\Http\Controllers\UserPanel\Exam;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamQuestionController extends Controller
{
    public function Index($exam)
    {
        return view('pages.exam.question.index', [
            'questions' => (new ExamSystemApi)->GetQuestionsList($exam)['response']
        ]);
    }

    public function Create()
    {
        return view('pages.exam.question.create');
    }

    public function Store(Request $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.exam.question.edit');
    }

    public function Update(Request $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
