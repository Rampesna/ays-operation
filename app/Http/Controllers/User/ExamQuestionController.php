<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamQuestionController extends Controller
{
    public function index($exam)
    {
        return view('pages.exam.question.index', [
            'questions' => (new ExamSystemApi)->GetQuestionsList($exam)['response']
        ]);
    }
}
