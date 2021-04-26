<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\EvaluationParameter;
use App\Models\Recruiting;
use App\Models\RecruitingActivity;
use App\Models\RecruitingEvaluationParameter;
use App\Models\RecruitingReservation;
use App\Models\RecruitingStep;
use App\Models\RecruitingStepSubStep;
use App\Models\RecruitingStepSubStepCheck;
use App\Models\RecruitingStepSubStepCheckActivity;
use App\Models\User;
use App\Services\RecruitingActivityService;
use App\Services\RecruitingReservationService;
use App\Services\RecruitingService;
use App\Services\RecruitingStepSubStepCheckActivityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\DataTables;

class RecruitingController extends Controller
{
    public function index(Request $request)
    {
        return Datatables::of(Recruiting::with(['step'])->whereIn('step_id', RecruitingStep::whereIn('management_department_id', User::find($request->auth_user_id)->managementDepartments()->pluck('id'))->pluck('id')))->
        filterColumn('step_id', function ($recruiting, $id) {
            return $id == 0 ? $recruiting : $recruiting->where('step_id', $id);
        })->
        editColumn('step_id', function ($recruiting) {
            return '<span class="btn btn-pill btn-sm btn-' . $recruiting->step->color . '" style="font-size: 11px; height: 20px; padding-top: 2px">' . $recruiting->step->name . '</span>';
        })->
        rawColumns(['step_id'])->
        make(true);
    }

    public function save(Request $request)
    {
        $recruitingService = new RecruitingService;
        $recruitingService->setRecruiting($request->id ? Recruiting::find($request->id) : new Recruiting);
        return response()->json($recruitingService->save($request), 200);
    }

    public function delete(Request $request)
    {
        Recruiting::find($request->id)->delete();
    }

    public function reactivate(Request $request)
    {
        $recruiting = Recruiting::find($request->id);
        $recruiting->step_id = 1;
        $recruiting->save();

        $recruitingActivityService = new RecruitingActivityService;
        $recruitingActivityService->setRecruitingActivity(new RecruitingActivity);
        $recruitingActivityService->save($recruiting->id, intval(1), $request->description, $request->user_id);

        $recruitingStepSubSteps = RecruitingStepSubStep::all();
        $evaluationParameters = EvaluationParameter::all();

        RecruitingStepSubStepCheck::where('recruiting_id', $recruiting->id)->delete();
        RecruitingEvaluationParameter::where('recruiting_id', $recruiting->id)->delete();

        foreach ($recruitingStepSubSteps as $recruitingStepSubStep) {
            $recruitingStepSubStepCheck = new RecruitingStepSubStepCheck;
            $recruitingStepSubStepCheck->recruiting_id = $recruiting->id;
            $recruitingStepSubStepCheck->recruiting_step_id = $recruitingStepSubStep->recruiting_step_id;
            $recruitingStepSubStepCheck->recruiting_step_sub_step_id = $recruitingStepSubStep->id;
            $recruitingStepSubStepCheck->save();
        }

        foreach ($evaluationParameters as $evaluationParameter) {
            $recruitingEvaluationParameter = new RecruitingEvaluationParameter;
            $recruitingEvaluationParameter->recruiting_id = $recruiting->id;
            $recruitingEvaluationParameter->parameter = $evaluationParameter->name;
            $recruitingEvaluationParameter->save();
        }
    }

    public function show(Request $request)
    {
        return response()->json(Recruiting::with([
            'activities' => function ($activities) {
                $activities->with([
                    'step',
                    'user'
                ]);
            },
            'evaluationParameters',
            'step'
        ])->find($request->recruiting_id), 200);
    }

    public function nextStepRecruiting(Request $request)
    {
        $recruiting = Recruiting::find($request->recruiting_id);

        $nextStepId = $recruiting->step_id + 1;

        $recruitingActivityService = new RecruitingActivityService;
        $recruitingActivityService->setRecruitingActivity(new RecruitingActivity);
        $recruitingActivityService->save($recruiting->id, intval($nextStepId), $request->description, $request->user_id);

        $recruiting->step_id = intval($nextStepId);
        $recruiting->save();

        $recruitingStep = RecruitingStep::find($nextStepId);

        $response = null;

        if ($recruitingStep->sms == 1 && $request->date) {

            $message = str_replace('#date#', date('d.m.Y H:i', strtotime($request->date)) ?? '', str_replace('#name#', $recruiting->name ?? '', str_replace('#manager#', ucwords(User::find($request->reservation_user_id)->name ?? ''), $recruitingStep->message)));

            $recruitingReservationService = new RecruitingReservationService;
            $recruitingReservationService->setRecruitingReservation(new RecruitingReservation);
            $recruitingReservation = $recruitingReservationService->saveWithParameter(
                $recruiting->id,
                $request->date,
                $message,
                $request->reservation_user_id
            );

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
                                'msg' => $message,
                                'tel' => [
                                    General::clearPhoneNumber($recruiting->phone_number)
                                ]
                            ]
                        ]
                    ])
                )
            ]);
        }

        return response()->json($response, 200);
    }

    public function cancelRecruiting(Request $request)
    {
        $recruiting = Recruiting::find($request->recruiting_id);

        $recruitingActivityService = new RecruitingActivityService;
        $recruitingActivityService->setRecruitingActivity(new RecruitingActivity);
        $recruitingActivityService->save($recruiting->id, 8, $request->description, $request->user_id);

        $recruiting->step_id = 8;
        $recruiting->save();
    }

    public function setRecruitingStepSubStepCheck(Request $request)
    {
        $check = RecruitingStepSubStepCheck::find($request->check_id);
        $check->check = $request->check;
        $check->save();

        $recruitingStepSubStepCheckActivityService = new RecruitingStepSubStepCheckActivityService;
        $recruitingStepSubStepCheckActivityService->setRecruitingStepSubStepCheckActivity(new RecruitingStepSubStepCheckActivity);
        $recruitingStepSubStepCheckActivityService->save($check->id, $request->user_id, $request->check, $request->description);
    }

    public function recruitingStepSubStepCheckActivities(Request $request)
    {
        return response()->json(RecruitingStepSubStepCheck::with([
            'activities' => function ($activities) {
                $activities->with([
                    'user'
                ]);
            },
        ])->find($request->check_id), 200);
    }

    public function sendSms(Request $request)
    {
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
                            'msg' => $request->message,
                            'tel' => [
                                General::clearPhoneNumber($recruiting->phone_number)
                            ]
                        ]
                    ]
                ])
            )
        ]);

        return response()->json([
            'status' => $response->status(),
            'message' => base64_decode($response->body())
        ]);
    }
}
