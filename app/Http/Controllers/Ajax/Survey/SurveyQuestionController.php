<?php

namespace App\Http\Controllers\Ajax\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    public function questionList(Request $request)
    {
        return response()->json((new SurveySystemApi)->GetSurveyQuestionsList($request->code)['response'], 200);
    }

    public function questionListForDiagram(Request $request)
    {

    }

    public function create(Request $request)
    {
        try {
            $response = (new SurveySystemApi)->SetSurveyQuestions($request);
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
        return response()->json((new SurveySystemApi)->GetSurveyQuestionEdit($request->id)['response'][0], 200);
    }

    public function update(Request $request)
    {
        try {
            $response = (new SurveySystemApi)->SetSurveyQuestions($request);
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
            $response = (new SurveySystemApi)->SetSurveyQuestionsDelete($request->id);
            return response()->json([
                'status' => 'Silindi',
                'response' => $response->status()
            ], 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 401);
        }
    }

}
