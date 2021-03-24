<?php

namespace App\Http\Controllers\Ajax\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function getSurveyList()
    {
        return response()->json((new SurveySystemApi)->GetSurveyList()['response'], 200);
    }

    public function create(Request $request)
    {
        try {
            $response = (new SurveySystemApi)->SetSurvey($request);
            return response()->json([
                'status' => 'Tamamlandı',
                'response' => $response->body()
            ], 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 401);
        }
    }

    public function edit(Request $request)
    {
        return response()->json((new SurveySystemApi)->GetSurveyEdit($request->id)['response'][0], 200);
    }

    public function update(Request $request)
    {
        try {
            $response = (new SurveySystemApi)->SetSurvey($request);
            return response()->json([
                'status' => 'Tamamlandı',
                'response' => $response->body()
            ], 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 401);
        }
    }

    public function delete(Request $request)
    {
        try {
            $response = (new SurveySystemApi)->SetSurveyDelete($request->id);
            return response()->json([
                'status' => 'Silindi',
                'response' => $response
            ], 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 401);
        }
    }

    public function setSurveyGroupConnect(Request $request)
    {
        try {
            $response = (new SurveySystemApi)->SetSurveyGroupConnect($request->main_code, $request->additional_code);
            return response()->json([
                'status' => 'Connected',
                'response' => $response->status()
            ], 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 401);
        }
    }
}
