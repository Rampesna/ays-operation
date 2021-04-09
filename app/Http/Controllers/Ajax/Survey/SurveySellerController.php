<?php

namespace App\Http\Controllers\Ajax\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveySellerController extends Controller
{
    public function sellerList(Request $request)
    {
        return response()->json((new SurveySystemApi)->GetSurveySellerList()['response'], 200);
    }

    public function save(Request $request)
    {
        try {
            $list = [];

            foreach ($request->surveys as $surveyCode) {
                foreach ($request->products as $productCode) {
                    $list[] = [
                        'saticiKodu' => $request->code,
                        'saticiAdi' => $request->name,
                        'durum' => 1,
                        'grupKodu' => $surveyCode,
                        'urunKodu' => $productCode,
                    ];
                }
            }

//            return $list;

            $response = (new SurveySystemApi)->SetSurveySellerConnect($list);
            return response()->json([
                'status' => 'Tamamlandı',
                'statusCode' => $response->status(),
                'response' => $response->body()
            ], 200);
        } catch (\Exception $exception) {
            return response()->json($exception, 401);
        }
    }

    public function edit(Request $request)
    {
        return response()->json([
            'seller' => (new SurveySystemApi)->GetSurveySellerEdit($request->seller_id)['response'],
            'sellerConnections' => (new SurveySystemApi)->GetSurveySellerCodeEdit($request->seller_code)['response']
        ], 200);
    }

    public function delete(Request $request)
    {
        return $response = (new SurveySystemApi)->SetSurveySellerDelete($request->seller_code);
        return $request;
    }
}
