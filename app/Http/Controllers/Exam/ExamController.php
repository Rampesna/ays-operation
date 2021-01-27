<?php

namespace App\Http\Controllers\Exam;

use App\Http\Requests\Exam\ExamStoreRequest;
use App\Http\Requests\Exam\ExamUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function Index()
    {
        return view('pages.exam.index');
    }

    public function Create()
    {
        return view('pages.exam.create');
    }

    public function Store(ExamStoreRequest $request)
    {

    }

    public function Edit($id)
    {
        return view('pages.exam.edit');
    }

    public function Update(ExamUpdateRequest $request)
    {

    }

    public function Delete(Request $request)
    {

    }
}
