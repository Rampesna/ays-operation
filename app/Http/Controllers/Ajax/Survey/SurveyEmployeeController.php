<?php

namespace App\Http\Controllers\Ajax\Survey;

use App\Http\Api\OperationApi\PersonSystem\PersonSystemApi;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyEmployeeController extends Controller
{
    public function update(Request $request)
    {
        try {
            $list = [];

            foreach ($request->employees as $employeeGuid) {
                $list[] = [
                    'grupKodu' => $request->survey_code,
                    'personId' => $employeeGuid
                ];
            }

            $response = (new SurveySystemApi)->SetSurveyPersonConnect($list);

            return response()->json([
                'statusCode' => $response->status(),
                'body' => $response->body(),
                'response' => $response['response']
            ], 200);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function scanDataUpdate(Request $request)
    {
        try {
            $list = [];

            foreach ($request->employees as $employeeGuid) {
                $list[] = [
                    'grupKodu' => $request->data_scan_group_code,
                    'personId' => $employeeGuid
                ];
            }

            $response = (new PersonSystemApi)->SetPersonDataScan($list);

            return response()->json([
                'statusCode' => $response->status(),
                'body' => $response->body(),
                'response' => $response['response']
            ], 200);
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
