<?php

namespace App\Http\Controllers\UserPanel\Integration;

use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithIdController extends Controller
{
    public function index()
    {
        return view('pages.integration.with-id.index');
    }

    public function store(Request $request)
    {
        try {
            $jobSystemApi = new JobsSystemApi();
            $jobSystemApi->SetJobsExcel([
                [
                    'id' => $request->id,
                    'oncelik' => $request->priority,
                    'Turu' => $request->type
                ]
            ]);
            $response = $jobSystemApi->SetJobsUyumIsId($request->id, $request->priority, $request->type);

            return redirect()->back()->with(['type' => 'success', 'data' => $response['response']]);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'API Bağlantısında Bir Sorun Meydana Geldi!']);
        }
    }
}
