<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $api = new ExamSystemApi();
        return $api->GetExamResultList(4)['response'];
    }
}
