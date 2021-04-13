<?php

namespace App\Http\Controllers\Ajax\IK;

use App\Http\Controllers\Controller;
use App\Models\Recruiting;
use App\Models\RecruitingActivity;
use App\Models\RecruitingStep;
use App\Models\RecruitingStepSubStep;
use App\Models\RecruitingStepSubStepCheck;
use App\Models\RecruitingStepSubStepCheckActivity;
use App\Models\Salary;
use App\Services\RecruitingActivityService;
use App\Services\RecruitingService;
use App\Services\RecruitingStepSubStepCheckActivityService;
use Illuminate\Http\Request;

class RecruitingController extends Controller
{
    public function create(Request $request)
    {
        $recruitingService = new RecruitingService;
        $recruitingService->setRecruiting(new Recruiting);
        $recruiting = $recruitingService->save($request);

        $recruitingStepSubSteps = RecruitingStepSubStep::all();

        foreach ($recruitingStepSubSteps as $recruitingStepSubStep) {
            $recruitingStepSubStepCheck = new RecruitingStepSubStepCheck;
            $recruitingStepSubStepCheck->recruiting_id = $recruiting->id;
            $recruitingStepSubStepCheck->recruiting_step_id = $recruitingStepSubStep->recruiting_step_id;
            $recruitingStepSubStepCheck->recruiting_step_sub_step_id = $recruitingStepSubStep->id;
            $recruitingStepSubStepCheck->save();
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
            'step'
        ])->find($request->recruiting_id), 200);
    }

    public function nextStepRecruiting(Request $request)
    {
        $recruiting = Recruiting::find($request->recruiting_id);

        $recruitingActivityService = new RecruitingActivityService;
        $recruitingActivityService->setRecruitingActivity(new RecruitingActivity);
        $recruitingActivityService->save($recruiting->id, intval($recruiting->step_id + 1), $request->description, $request->user_id);

        $recruiting->step_id = intval($recruiting->step_id + 1);
        $recruiting->save();
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
