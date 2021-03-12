<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\PersonReport\PersonReportApi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $api = new PersonReportApi();
        return $api->GetPersonReport('2021-03-11', '2021-03-11');
    }
}
