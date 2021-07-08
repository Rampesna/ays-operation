<?php

namespace App\Http\Controllers\Api\Santral;

use App\Http\Api\NetsantralApi;
use App\Http\Controllers\Api\Response;
use App\Models\Queue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SantralController extends Controller
{
    public function abandons(Request $request)
    {
        $netSantralApi = new NetsantralApi;
        $queues = Queue::where('company_id', 1)->pluck('short')->toArray();
        $response = (array)json_decode($netSantralApi->Abandons($queues)->body());

        $list = [];

        foreach ($queues as $queue) {
            if ($getQueue = Queue::where('short', $queue)->first()) {
                if (!is_null($getQueue->group_code) && $getQueue->group_code != 0) {
                    foreach ($response[$queue] as $phone) {
                        if (
                            $phone->isProcessed == 0 ||
                            $phone->isProcessed == "0" ||
                            $phone->result == "" ||
                            $phone->result == "Cevap Yok" ||
                            $phone->result == "Meşgul"
                        ) {
                            $list[] = [
                                'kayipGrupKodu' => $getQueue->group_code,
                                'tel' => $phone->callerNumber
                            ];
                        }
                    }
                }
            }
        }

        $operationApi = new \App\Http\Api\OperationApi\Operation\OperationApi;
        $operationApi->SetLostList($list);

        return response()->json(Response::SuccessResponse(null, ''));
    }
}
