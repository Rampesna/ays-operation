<?php

namespace App\Http\Controllers\UserPanel\Integration;

use App\Http\Api\OperationApi\JobsSystem\JobsSystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function deleteActivity()
    {
        return view('pages.integration.activity.delete-activity');
    }

    public function delete(Request $request)
    {
        try {
            $api = new JobsSystemApi();
            $api->SetJobCaseWorkDelete($request->id);

            return redirect()->back()->with(['type' => 'success', 'data' => 'Faaliyet Başarıyla Silindi']);
        } catch (\Exception $exception) {
            return redirect()->back()->with(['type' => 'error', 'data' => 'API\'ye Bağlanılırken Bir Hata Oluştu!']);
        }
    }
}