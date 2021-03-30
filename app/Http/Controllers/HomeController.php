<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use App\Models\Permit;
use App\Services\PermitService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $service = new PermitService;
        $service->setPermit(Permit::find(1));
        return $service->getDuration();
    }
}
