<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Helpers\General;
use App\Http\Api\SMS\SmsApi;
use App\Http\Controllers\Controller;
use App\Models\Recruiting;
use App\Models\RecruitingReservation;
use App\Services\RecruitingReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecruitingReservationController extends Controller
{
    public function save(Request $request)
    {
        $recruitingReservationService = new RecruitingReservationService;
        $recruitingReservationService->setRecruitingReservation($request->id ? RecruitingReservation::find($request->id) : new RecruitingReservation);
        $recruitingReservation = $recruitingReservationService->save($request);

        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->asForm()->post('http://api.mesajpaneli.com/json_api/', [
            'data' => base64_encode(
                json_encode([
                    'user' => [
                        'name' => '5435754775',
                        'pass' => '357159'
                    ],
                    'msgBaslik' => 'AYSSOFT',
                    'tr' => true,
                    'start' => 1490001000,
                    'msgData' => [
                        [
                            'msg' => $request->get('content'),
                            'tel' => [
                                General::clearPhoneNumber(Recruiting::find($request->recruiting_id)->phone_number)
                            ]
                        ]
                    ]
                ])
            )
        ]);

        return response()->json([
            'reservation' => $recruitingReservation,
            'smsApiResponseBody' => $response->body()
        ], 200);
    }
}
