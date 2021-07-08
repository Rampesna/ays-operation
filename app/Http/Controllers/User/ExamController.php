<?php

namespace App\Http\Controllers\User;

use App\Http\Api\OperationApi\ExamSystem\ExamSystemApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index()
    {
        return view('pages.exam.index', [
            'exams' => (new ExamSystemApi)->GetExamList()['response']
        ]);
    }

    public function getExamEmployees($examId)
    {
        return view('pages.exam.employees.index', [
            'employees' => (new ExamSystemApi)->GetExamResultReadingList($examId)['response'],
            'examId' => $examId
        ]);
    }

    public function getExamResults($id, $examId, $name)
    {
//        return (new ExamSystemApi)->GetExamResultReadingReplyList($id, $examId)['response'];
        return view('pages.exam.results.index', [
            'results' => (new ExamSystemApi)->GetExamResultReadingReplyList($id, $examId)['response'],
            'employeeId' => $id,
            'examId' => $examId,
            'name' => $name
        ]);
    }

    public function setExamResults(Request $request)
    {
//        return $request->all();

        $answerList = [];

        $true = 0;
        $false = 0;

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'answer_') !== false) {
                $id = str_replace('answer_', '', $key);
                if ($value == "1") {
                    $true += 1;
                } else {
                    $false += 1;
                }
                $answerList[] = [
                    'cevapId' => $id,
                    'durum' => $value == "1" ? 1 : 0,
                    'sinavId' => $request->exam_id,
                    'kullaniciId' => $request->employee_id
                ];
            }
        }

        foreach ($answerList as $key => $value) {
            $answerList[$key]['puan'] = (100 / count($answerList)) * $true;
        }

        $api = new ExamSystemApi;
        $response = $api->SetExamResultReadingReply($answerList);

        if ($response->status() == 200) {
            return redirect()->back()->with(['type' => 'success', 'data' => 'Başarıyla Kaydedildi']);
        } else {
            return $response->body();
        }
    }

    public function getResults($id)
    {
        return view('pages.exam.result', [
            'results' => (new ExamSystemApi)->GetExamResultList($id)['response']
        ]);
    }
}
