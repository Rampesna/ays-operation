<?php

namespace App\Http\Controllers\Ajax\Survey;

use App\Helpers\General;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class SurveyAnswerController extends Controller
{
    public function create(Request $request)
    {
        $response = (new SurveySystemApi)->SetSurveyAnswers($request);

        $answerId = $response['response'];
        $list = !is_null($request->groups) ? explode(',', General::clearTagifyTags($request->groups)) : [];
        $groupsList = [];
        $questionsList = [];

        foreach ($list as $item) {
            $groupsList[] = [
                'anketCevaplarId' => $answerId,
                'kategori' => $item
            ];
        }

        $groupResponse = (new SurveySystemApi)->SetSurveyAnswersCategoryConnect($groupsList);

        if ($request->questions) {
            foreach ($request->questions as $question) {
                $questionsList[] = [
                    'sorularId' => $question,
                    'cevaplarId' => $answerId
                ];
            }
        }

        $questionsResponse = (new SurveySystemApi)->SetSurveyAnswersConnect($questionsList);

        return response()->json([
            'status' => 'Tamamlandı',
            'response' => $response->body(),
            'groupResponse' => $groupResponse->body(),
            'questionsResponse' => $questionsResponse->body()
        ], 200);
    }

    public function edit(Request $request)
    {
        return response()->json([
            'answer' => (new SurveySystemApi)->GetSurveyAnswerEdit($request->id)['response'][0],
            'groups' => (new SurveySystemApi)->GetSurveyAnswersCategoryConnectList($request->id)['response'],
            'questions' => (new SurveySystemApi)->GetSurveyAnswersConnectList($request->id)['response']
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $response = (new SurveySystemApi)->SetSurveyAnswers($request);

            $list = !is_null($request->groups) ? explode(',', General::clearTagifyTags($request->groups)) : [];
            $groupsList = [];
            $questionsList = [];

            foreach ($list as $item) {
                $groupsList[] = [
                    'anketCevaplarId' => $request->id,
                    'kategori' => $item
                ];
            }

            $groupResponse = (new SurveySystemApi)->SetSurveyAnswersCategoryConnect($groupsList);

            $oldQuestions = (new SurveySystemApi)->GetSurveyAnswersConnectList($request->id)['response'] ?? [];

            foreach ($oldQuestions as $oldQuestion) {
                (new SurveySystemApi)->SetSurveyAnswersConnectDelete($oldQuestion['id'], $request->code);
            }

            if ($request->questions) {
                foreach ($request->questions as $question) {
                    $questionsList[] = [
                        'sorularId' => $question,
                        'cevaplarId' => $request->id
                    ];
                }
            }

            $questionsResponse = (new SurveySystemApi)->SetSurveyAnswersConnect($questionsList);

            return response()->json([
                'status' => 'Tamamlandı',
                'response' => $response->body(),
                'groupResponse' => $groupResponse->body(),
                'questionsResponse' => $questionsResponse->body()
            ], 200);
        } catch (\Exception $exception) {
            return response()->json($exception);
        }
    }

    public function delete(Request $request)
    {
        try {
            $response = (new SurveySystemApi)->SetSurveyAnswersDelete($request->id);
            return response()->json([
                'status' => 'Silindi',
                'response' => $response->status()
            ], 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 401);
        }
    }
}
