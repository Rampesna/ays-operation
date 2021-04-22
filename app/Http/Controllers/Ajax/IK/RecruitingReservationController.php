<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\ManagementDepartment;
use App\Models\Recruiting;
use App\Models\RecruitingReservation;
use App\Models\User;
use App\Services\RecruitingReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecruitingReservationController extends Controller
{
    public function calendar(Request $request)
    {

        return response()->json(RecruitingReservation::with([
            'recruiting'
        ])->
        whereBetween('date', [
            date('Y-m-d 00:00:00', strtotime($request->start_date)),
            date('Y-m-t 23:59:59', strtotime($request->end_date))
        ])->
        get(), 200);
    }

    public function show(Request $request)
    {
        return response()->json(RecruitingReservation::with([
            'recruiting' => function ($recruiting) {
                $recruiting->with([
                    'activities' => function ($activities) {
                        $activities->with([
                            'user',
                            'step'
                        ]);
                    },
                    'evaluationParameters',
                    'step'
                ]);
            }
        ])->find($request->id), 200);
    }

    public function save(Request $request)
    {
        $recruitingReservationService = new RecruitingReservationService;
        $recruitingReservationService->setRecruitingReservation($request->id ? RecruitingReservation::find($request->id) : new RecruitingReservation);
        $recruitingReservation = $recruitingReservationService->save($request);

        $recruiting = Recruiting::find($request->recruiting_id);

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
                            'msg' => str_replace('#date#', date('d.m.Y, H:i', strtotime($request->date)), str_replace('#name#', $recruiting->name, str_replace('#manager#', ucwords(User::find($request->user_id)->name ?? ''), $request->get('content')))),
                            'tel' => [
                                General::clearPhoneNumber($recruiting->phone_number)
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

    public function control(Request $request)
    {
        return response()->json(RecruitingReservation::whereBetween('date', [
            date('Y-m-d H:i:s', strtotime('-30 minutes', strtotime(date('Y-m-d H:i:s', strtotime($request->date))))),
            date('Y-m-d H:i:s', strtotime('+30 minutes', strtotime(date('Y-m-d H:i:s', strtotime($request->date))))),
        ])->
        where('user_id', $request->user_id)->
        get(), 200);
    }
}
