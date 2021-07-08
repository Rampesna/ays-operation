<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamAnswerController extends Controller
{
    public function index()
    {
        return view('pages.exam.answer.index');
    }
}
