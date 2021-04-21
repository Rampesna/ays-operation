<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Helpers\General;
use App\Http\Controllers\Controller;
use App\Models\Recruiting;
use App\Models\RecruitingActivity;
use App\Models\RecruitingStep;
use App\Models\RecruitingStepSubStep;
use App\Models\RecruitingStepSubStepCheck;
use App\Models\RecruitingStepSubStepCheckActivity;
use App\Models\Salary;
use App\Models\User;
use App\Services\RecruitingActivityService;
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
        filterColumn('step_id', function ($recruiting, $ids) {
            return $recruiting->whereIn('step_id', $ids);
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

    public function show(Request $request)
    {
        return response()->json(Recruiting::with([
            'activities' => function ($activities) {
                $activities->with([
                    'step',
                    'user'
                ]);
            },
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

        if ($recruitingStep->sms == 1) {
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
                                'msg' => str_replace('#date#', date('d.m.Y 10:30', strtotime('+1 days')), str_replace('#name#', $recruiting->name, $recruitingStep->message)),
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
}
