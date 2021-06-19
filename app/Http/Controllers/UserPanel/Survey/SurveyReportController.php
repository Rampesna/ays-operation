<?php

namespace App\Http\Controllers\UserPanel\Survey;

use App\Helpers\General;
use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyReportController extends Controller
{
    public function index()
    {
        return view('pages.survey.report.index');
    }

    public function show(Request $request)
    {
        $startDate = $request->start_date ?? null;
        $endDate = $request->end_date ?? null;

        return view('pages.survey.report.show.index', [
            'name' => $request->name,
            'surveyCode' => $request->code,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'list' => (new SurveySystemApi)->GetSurveyReport($request->code, $startDate, $endDate)['response'] ?? []
        ]);
    }

    public function showByEmployee(Request $request)
    {
        $surveyReportStatusCodes = [];
        $surveyReport = (new SurveySystemApi)->GetSurveyReport($request->code, date('2021-01-01 09:00:00'), date('Y-m-d H:i:s'))['response'];
        $statusList = [];

        foreach ($surveyReport as $report) {
            $surveyReportStatusCodes[] = [
                'statusCode' => $report['pazarlamaDurumKodu']
            ];

            $statusList[$report['pazarlamaDurumKodu']] = $report['adi'];
        }

        $surveyReportStatusDetails = ((array)json_decode(
            (new SurveySystemApi)->GetSurveyReportStatusDetails(
                $request->code,
                date('2021-01-01 09:00:00'),
                date('Y-m-d H:i:s'),
                $surveyReportStatusCodes
            )->getBody()->getContents())
        );

        $responseArray = [];

        foreach ($surveyReportStatusDetails['response'] as $surveyReportStatusDetail) {
            if (($nameKey = General::searchForKeyword('name', $surveyReportStatusDetail->kullaniciAdSoyad, $responseArray)) != -1) {
                if (isset($responseArray[$nameKey]['data'][$surveyReportStatusDetail->pazarlamaDurumKodu])) {
                    $responseArray[$nameKey]['data'][$surveyReportStatusDetail->pazarlamaDurumKodu]['count'] += 1;
                } else {
                    $responseArray[$nameKey]['data'][$surveyReportStatusDetail->pazarlamaDurumKodu] = [
                        'name' => $statusList[$surveyReportStatusDetail->pazarlamaDurumKodu],
                        'count' => 1
                    ];
                }
            } else {
                $responseArray[] = [
                    'name' => $surveyReportStatusDetail->kullaniciAdSoyad,
                    'data' => [
                        $surveyReportStatusDetail->pazarlamaDurumKodu => [
                            'name' => $statusList[$surveyReportStatusDetail->pazarlamaDurumKodu],
                            'count' => 1
                        ]
                    ]
                ];
            }
        }

//        return $responseArray;

        return view('pages.survey.report.showByEmployee.index', [
            'name' => $request->name,
            'surveyCode' => $request->code,
            'list' => $surveyReport ?? [],
            'employees' => $responseArray
        ]);
    }
}
