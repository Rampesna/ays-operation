<?php

namespace App\Http\Controllers\UserPanel\Exam;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function Index()
    {
        return view('pages.exam.index', [
            'exams' => (new ExamSystemApi)->GetExamList()['response']
        ]);
    }

    public function Create()
    {
        return view('pages.exam.create');
    }

    public function Store(Request $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.exam.edit');
    }

    public function Update(Request $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
