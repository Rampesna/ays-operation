<?php

namespace App\Http\Controllers\UserPanel\Integration;

use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IntegrationController extends Controller
{
    public function reActivateSuspendedJobs(Request $request)
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
