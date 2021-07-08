<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReActivateSuspendedJobsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $api = new JobsSystemApi();
            $response = $api->SetJobSuspend();

            return redirect()->back()->with(['type' => 'success', 'data' => $response['response']]);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'API\'ye Bağlanılırken Bir Hata Oluştu!']);
        }
    }
}
