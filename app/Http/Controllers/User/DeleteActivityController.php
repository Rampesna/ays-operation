<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteActivityController extends Controller
{
    public function index()
    {
        return view('pages.integration.activity.delete-activity');
    }

    public function delete(Request $request)
    {
        try {
            $api = new JobsSystemApi();
            $response = $api->SetJobCaseWorkDelete($request->id);

            if ($response->status() == 200) {
                return redirect()->back()->with(['type' => 'success', 'data' => @$response['message'] ?? $response->status()]);
            } else {
                return $response;
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'API\'ye Bağlanılırken Bir Hata Oluştu!']);
        }
    }
}
