<?php

namespace App\Http\Controllers\Ajax\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Cyberduck\LaravelExcel\Importer\Excel;
use GuzzleHttp\Client;
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
            $callList = [];
            if ($request->hasFile('call_file')) {
                if ($request->file('call_file')->getClientMimeType() == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                    $name = date('Ymd_His');
                    $file = $request->file('call_file');
                    $fileName = $name . '-' . $file->getClientOriginalName();
                    $path = public_path('/integration/excel-data/');
                    $file->move($path, $fileName);

                    $excel = new Excel();
                    $excel->load($path . $fileName);
                    $collection = $excel->getCollection();

                    foreach ($collection as $data) {
                        if (gettype($data[0]) == 'integer') {
                            $callList[] = [
                                'cariId' => $data[0]
                            ];
                        }
                    }
                }
            }

            $responseSurvey = (new SurveySystemApi)->SetSurvey($request, $callList);

            $list = [];

            foreach ($request->new_sellers ?? [] as $newSeller) {
                $products = explode(',', $newSeller['products']);
                foreach ($products as $productCode) {
                    $list[] = [
                        'saticiKodu' => $newSeller['code'],
                        'saticiAdi' => $newSeller['name'],
                        'durum' => 1,
                        'grupKodu' => $request->code,
                        'urunKodu' => $productCode,
                    ];
                }
            }

            $responseSellers = (new SurveySystemApi)->SetSurveySellerConnect($list);

            return response()->json([
                'status' => 'Tamamlandı',
                'response' => [
                    'survey' => $responseSurvey->body(),
                    'sellers' => $responseSellers->body(),
                    'callList' => $callList
                ]
            ], 200);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function edit(Request $request)
    {
        return response()->json((new SurveySystemApi)->GetSurveyEdit($request->id)['response'][0], 200);
    }

    public function update(Request $request)
    {
        try {
            $callList = [];
            if ($request->hasFile('call_file')) {
                if ($request->file('call_file')->getClientMimeType() == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                    $name = date('Ymd_His');
                    $file = $request->file('call_file');
                    $fileName = $name . '-' . $file->getClientOriginalName();
                    $path = public_path('/integration/excel-data/');
                    $file->move($path, $fileName);

                    $excel = new Excel();
                    $excel->load($path . $fileName);
                    $collection = $excel->getCollection();

                    foreach ($collection as $data) {
                        if (gettype($data[0]) == 'integer') {
                            $callList[] = [
                                'cariId' => $data[0]
                            ];
                        }
                    }
                }
            }

            $response = (new SurveySystemApi)->SetSurvey($request, $callList);
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

    public function scriptReportDetail(Request $request)
    {
        $list = [];
        foreach ($request->ids as $id) {
            $list[] = [
                'statusCode' => $id
            ];
        }

        return ((array)json_decode((new SurveySystemApi)->GetSurveyReportStatusDetails($request->code, $request->start_date, $request->end_date, $list)->getBody()->getContents()))['response'];
    }

    public function scriptCallReportDetail(Request $request)
    {
        return response()->json((new SurveySystemApi)->GetSurveyReportWantedDetails($request->code, $request->start_date, $request->end_date)['response'], 200);
    }

    public function scriptRemainingReportDetail(Request $request)
    {
        return response()->json((new SurveySystemApi)->GetSurveyReportRemainingDetails($request->code, $request->start_date, $request->end_date)['response'], 200);
    }
}
