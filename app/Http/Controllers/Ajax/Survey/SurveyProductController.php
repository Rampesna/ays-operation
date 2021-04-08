<?php

namespace App\Http\Controllers\Ajax\Survey;

use App\Http\Api\OperationApi\SurveySystem\SurveySystemApi;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class SurveyProductController extends Controller
{
    public function productList(Request $request)
    {
        return response()->json((new SurveySystemApi)->GetSurveyProductList()['response'], 200);
    }

    public function create(Request $request)
    {
        try {
            $list = [];
            $list[] = [
                'kodu' => $request->code,
                'adi' => $request->name,
                'durum' => $request->status,
                'epostaBaslik' => $request->email_title,
                'epostaIcerik' => $request->hasFile('file') ? file_get_contents($request->file('file')) : ''
            ];

            $response = (new SurveySystemApi)->SetSurveyProduct($list);

            return response()->json([
                'status' => 'Tamamlandı',
                'statusCode' => $response->status(),
                'body' => $response->body()
            ], 200);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function edit(Request $request)
    {
        return response()->json((new SurveySystemApi)->GetSurveyProductEdit($request->product_id)['response'][0], 200);
    }

    public function update(Request $request)
    {
        try {
            $list = [];
            $list[] = [
                'id' => $request->id,
                'kodu' => $request->code,
                'adi' => $request->name,
                'durum' => $request->status,
                'epostaBaslik' => $request->email_title,
                'epostaIcerik' => $request->hasFile('file') ? file_get_contents($request->file('file')) : ''
            ];

            $response = (new SurveySystemApi)->SetSurveyProduct($list);

            return response()->json([
                'status' => 'Tamamlandı',
                'statusCode' => $response->status(),
                'body' => $response->body()
            ], 200);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function delete(Request $request)
    {

    }
}
